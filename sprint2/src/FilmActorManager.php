<?php
class FilmActorManager {
    private $database;
    
    public function __construct(Database $db) {
        $this->database = $db;
    }
    
    public function linkExists($film_id, $actor_id) {
        $sql = "SELECT COUNT(*) FROM film_actors WHERE film_id = ? AND actor_id = ?";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute([$film_id, $actor_id]);
        return $stmt->fetchColumn() > 0;
    }
    
    public function linkActorToFilm($film_id, $actor_id) {
        // Controleer eerst op duplicaten
        if ($this->linkExists($film_id, $actor_id)) {
            return false; // Duplicate found
        }
        
        $sql = "INSERT INTO film_actors (film_id, actor_id) VALUES (?, ?)";
        $stmt = $this->database->getPdo()->prepare($sql);
        return $stmt->execute([$film_id, $actor_id]);
    }
    
    public function getFilmActors($film_id) {
        $sql = "SELECT a.* FROM actors a 
                JOIN film_actors fa ON a.id = fa.actor_id 
                WHERE fa.film_id = ?";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute([$film_id]);
        return $stmt->fetchAll();
    }
    
    public function getActorFilms($actor_id) {
        $sql = "SELECT f.* FROM films f 
                JOIN film_actors fa ON f.film_id = fa.film_id 
                WHERE fa.actor_id = ?";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute([$actor_id]);
        return $stmt->fetchAll();
    }
    
    public function getAllFilmActors() {
        $sql = "SELECT f.name as film_name, a.name as actor_name, f.film_id, a.id as actor_id
                FROM film_actors fa
                JOIN films f ON fa.film_id = f.film_id
                JOIN actors a ON fa.actor_id = a.id
                ORDER BY f.name, a.name";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function removeFilmActor($film_id, $actor_id) {
        $sql = "DELETE FROM film_actors WHERE film_id = ? AND actor_id = ?";
        $stmt = $this->database->getPdo()->prepare($sql);
        return $stmt->execute([$film_id, $actor_id]);
    }
}