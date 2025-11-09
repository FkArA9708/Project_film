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
        // Haal laatste films op met hun acteurs (zoals in wireframe)
        $recentFilms = $this->filmManager->getAllFilms();
        
        // Voor elke film de bijbehorende acteurs ophalen
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