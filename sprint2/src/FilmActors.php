<?php

class FilmActor {
    private $film_id;
    private $actor_id;
    private $created_at;
    
    public function __construct($film_id, $actor_id, $created_at = null) {
        $this->film_id = $film_id;
        $this->actor_id = $actor_id;
        $this->created_at = $created_at;
    }
    
    
    public function getFilmId() { return $this->film_id; }
    public function getActorId() { return $this->actor_id; }
    public function getCreatedAt() { return $this->created_at; }
}