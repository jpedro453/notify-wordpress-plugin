<?php

namespace inc\Infra\Repositories;

use inc\Domain\Interfaces\Database\IPlatformRepository;
use inc\Domain\Interfaces\Database\IPlatformDatabase;

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

    public function getDetail($name, $detail){
        return $this->database->getDetail($name, $detail);
    }

    public function update($platform_name, $active, $details){
        $this->database->updatePlatform($platform_name, $active, $details);
        
    }
    public function delete($name){
        $this->database->deletePlatform($name);
        
    }
}