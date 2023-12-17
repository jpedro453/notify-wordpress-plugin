<?php

use Application\Interfaces\IPlatformRepository;
use Application\Interfaces\IPlatformDatabase;

class GG_PlatformsRepository implements IPlatformRepository{

    public IPlatformDatabase $database;

    public function __construct(IPlatformDatabase $database) {
        $this->database = $database;
    }
    
    public function create($platform_name, $details){
        $this->database->createPlatform('name', 'details');

    }
    public function getAll(){
        $this->database->getAllPlatforms();
    }
    public function update(){
        $this->database->updatePlatform();
        
    }
    public function delete(){
        $this->database->deletePlatform();
        
    }
}