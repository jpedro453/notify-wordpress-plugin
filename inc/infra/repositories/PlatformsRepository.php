<?php

namespace inc\infra\repositories;

use inc\domain\interfaces\Database\IPlatformRepository;
use inc\domain\interfaces\Database\IPlatformDatabase;

class PlatformsRepository implements IPlatformRepository{

    public IPlatformDatabase $database;

    public function __construct(IPlatformDatabase $database) {
        $this->database = $database;
    }
    
    public function create($platform_name, $details){
        $this->database->createPlatform($platform_name, $details);

    }
    public function getByName($name)
    {
        return $this->database->getByName($name);
        
    }
    public function getAll(){
        return $this->database->getAllPlatforms();
    }
    public function update(){
        $this->database->updatePlatform();
        
    }
    public function delete(){
        $this->database->deletePlatform();
        
    }
}