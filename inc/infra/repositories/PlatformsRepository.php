<?php

namespace inc\infra\repositories;

use inc\application\interfaces\Platform\IPlatformRepository;
use inc\application\interfaces\Platform\IPlatformDatabase;

class PlatformsRepository implements IPlatformRepository{

    public IPlatformDatabase $database;

    public function __construct(IPlatformDatabase $database) {
        $this->database = $database;
    }
    
    public function create($platform_name, $details){
        $this->database->createPlatform($platform_name, $details);

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