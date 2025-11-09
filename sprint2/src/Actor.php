<?php
class Actor {
    private $id;
    private $name;
    
    // constructor and getters/setters here...
    public function __construct($name, $id = null) {
    $this->id = $id;
    $this->name = $name;
}

public function getId() { return $this->id; }
public function getName() { return $this->name; }
  
  // Getters and setters for $id and $name ...
}