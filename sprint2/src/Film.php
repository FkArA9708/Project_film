<?php
class Film {
    private $film_id;
    private $name;
    private $genre;  // TOEVOEGEN
    
    public function __construct($name, $genre, $film_id = null) {
        $this->film_id = $film_id;
        $this->name = $name;
        $this->genre = $genre;  // TOEVOEGEN
    }
    
    public function getId() { return $this->film_id; }
    public function getName() { return $this->name; }
    public function getGenre() { return $this->genre; }  // TOEVOEGEN
}