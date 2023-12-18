<?php

namespace inc\application\interfaces\Platform;

interface IPlatformDatabase{
    public function getAllPlatforms();
    public function updatePlatform() ;
    public function deletePlatform() ;
    public function createPlatform($platformName, $details) ;
}