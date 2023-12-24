<?php

namespace inc\Domain\Interfaces\Database;

interface IPlatformDatabase{
    public function getAllPlatforms();
    public function getByName($name);
    public function updatePlatform($platformName, $active, $details) ;
    public function getDetail($name, $detail) ;
    public function deletePlatform($name) ;
    public function createPlatform($platformName, $details) ;
}