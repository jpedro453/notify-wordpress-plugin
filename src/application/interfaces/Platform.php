<?php

namespace Application\Interfaces;

interface IPlatform {
    public function sendNotification(String $message);
}

interface IPlatformRepository {
    public function getAll();
    public function create($platform_name, $details);
    public function update();
    public function delete();
}

interface IPlatformDatabase{
    public function getAllPlatforms();
    public function updatePlatform() ;
    public function deletePlatform() ;
    public function createPlatform($platformName, $details) ;
}