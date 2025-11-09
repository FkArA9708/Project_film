<?php
class FilmManager {
    private $database;
    
    public function __construct(Database $db) {
        $this->database = $db;
    }
    
    public function filmExists($name, $genre) {
        $sql = "SELECT COUNT(*) FROM films WHERE name = ? AND genre = ?";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute([$name, $genre]);
        return $stmt->fetchColumn() > 0;
    }
    
    public function getAllFilms() {
        $sql = "SELECT * FROM films ORDER BY created_at DESC";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute();
        $filmsData = $stmt->fetchAll();
        
        $films = [];
        foreach ($filmsData as $data) {
            $films[] = new Film($data['name'], $data['genre'], $data['film_id']);
        }
        return $films;
    }
    
    public function addFilm($name, $genre) {
        // Controleer eerst op duplicaten
        if ($this->filmExists($name, $genre)) {
            return false; // Duplicate found
        }
        
        $sql = "INSERT INTO films (name, genre) VALUES (?, ?)";
        $stmt = $this->database->getPdo()->prepare($sql);
        return $stmt->execute([$name, $genre]);
    }


    public function getFilmById($id) {
        $sql = "SELECT * FROM films WHERE film_id = ?";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        
        if ($data) {
            return new Film($data['name'], $data['genre'], $data['film_id']);
        }
        return null;
    }
    
    public function getFilmsByGenre($genre) {
        $sql = "SELECT * FROM films WHERE genre = ? ORDER BY created_at DESC";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute([$genre]);
        $filmsData = $stmt->fetchAll();
        
        $films = [];
        foreach ($filmsData as $data) {
            $films[] = new Film($data['name'], $data['genre'], $data['film_id']);
        }
        return $films;
    }

    public function deleteFilm($film_id) {
    $sql = "DELETE FROM films WHERE film_id = ?";
    $stmt = $this->database->getPdo()->prepare($sql);
    return $stmt->execute([$film_id]);
}
}