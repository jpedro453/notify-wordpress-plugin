<?php

namespace inc\Infra\Services\Platforms;

use inc\Domain\Interfaces\Services\IPlatformService;


class EmailPlatform implements IPlatformService{

    private $details;

    public function __construct($details) {
        $this->details = $details;
    }

    public function sendNotification($title, $description){}

}