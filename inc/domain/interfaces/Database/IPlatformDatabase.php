<?php

namespace inc\domain\interfaces\Database;

interface IPlatformDatabase{
    public function getAllPlatforms();
    public function getByName($name);
    public function updatePlatform() ;
    public function deletePlatform() ;
    public function createPlatform($platformName, $details) ;
}