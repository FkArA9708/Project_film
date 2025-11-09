<?php
class ActorManager {
    private $database;
    
    public function __construct(Database $db) {
        $this->database = $db;
    }
    
    public function actorExists($name) {
        $sql = "SELECT COUNT(*) FROM actors WHERE name = ?";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute([$name]);
        return $stmt->fetchColumn() > 0;
    }
    
    public function getActorById($id) {
        $sql = "SELECT * FROM actors WHERE id = ?";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        
        if ($data) {
            return new Actor($data['name'], $data['id']);
        }
        return null;
    }

    public function getAllActors() {
        $sql = "SELECT * FROM actors ORDER BY name";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute();
        $actorsData = $stmt->fetchAll();
        
        $actors = [];
        foreach ($actorsData as $data) {
            $actors[] = new Actor($data['name'], $data['id']);
        }
        return $actors;
    }
    
    public function addActor($name) {
        // Controleer eerst op duplicaten
        if ($this->actorExists($name)) {
            return false; // Duplicate found
        }
        
        $sql = "INSERT INTO actors (name) VALUES (?)";
        $stmt = $this->database->getPdo()->prepare($sql);
        return $stmt->execute([$name]);
    }
}