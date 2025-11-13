<?php
class Home {
    private $database;
    
    public function __construct(Database $db) {
        $this->database = $db;
    }
    
    public function getRecentFilmsWithActors() {
        
        $sql = "SELECT f.*, GROUP_CONCAT(a.name SEPARATOR ', ') as actor_names
                FROM films f 
                LEFT JOIN film_actors fa ON f.film_id = fa.film_id 
                LEFT JOIN actors a ON fa.actor_id = a.id 
                GROUP BY f.film_id 
                ORDER BY f.created_at DESC";
        
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getFilmCount() {
        $sql = "SELECT COUNT(*) as count FROM films";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    public function getActorCount() {
        $sql = "SELECT COUNT(*) as count FROM actors";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}