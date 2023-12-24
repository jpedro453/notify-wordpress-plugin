<?php

namespace inc\Infra\Services;

use inc\Domain\Interfaces\Services\IPlatformService;


class EmailPlatform implements IPlatformService{

    private array $details;

    public function __construct($details) {
        $this->details = $details;
    }

    public function sendNotification(){}

}