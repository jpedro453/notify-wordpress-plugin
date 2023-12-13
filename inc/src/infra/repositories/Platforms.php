<?php

require_once __DIR__ . '/inc/src/infra/database/Platforms.php';

class GG_PlatformsRepository implements IPlatformRepository{

    public IPlatformRepository $database;

    public function __construct(IPlatformRepository $database) {
        $this->database = $database;
    }

    public function GetAll(){
        $this->database->GetAll();
    }
    public function Update(){
        $this->database->Update();
        
    }
    public function Delete(){
        $this->database->Delete();
        
    }
    public function Create(){
        $this->database->Create();

    }
}