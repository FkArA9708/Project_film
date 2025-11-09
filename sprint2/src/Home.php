<?php
class Home {
    private $filmManager;
    private $actorManager;
    private $filmActorManager;
    
    public function __construct($filmManager, $actorManager, $filmActorManager) {
        $this->filmManager = $filmManager;
        $this->actorManager = $actorManager;
        $this->filmActorManager = $filmActorManager;
    }
    
    public function index() {
        
        $recentFilms = $this->filmManager->getAllFilms();
        
        
        $filmsWithActors = [];
        foreach ($recentFilms as $film) {
            $actors = $this->filmActorManager->getFilmActors($film->getId());
            $filmsWithActors[] = [
                'film' => $film,
                'actors' => $actors
            ];
        }
        
        return $filmsWithActors;
    }
}