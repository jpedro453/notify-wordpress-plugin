<?php

namespace inc\application\interfaces\Platform;



interface IPlatform{
    public function sendNotification(String $message);
}

interface IPlatformDatabase{
    public function getAllPlatforms();
    public function updatePlatform() ;
    public function deletePlatform() ;
    public function createPlatform($platformName, $details) ;
}
interface IPlatformRepository{
    public function getAll();
    public function create($platform_name, $details);
    public function update();
    public function delete();
}
