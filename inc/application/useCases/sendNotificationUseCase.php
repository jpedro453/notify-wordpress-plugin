<?php

namespace inc\Application\UseCases;

use inc\Domain\Interfaces\Database\IPlatformRepository;
use inc\Domain\Interfaces\Services\IDiscordPlatform;
use inc\Domain\Interfaces\Services\INotificationService;

class sendNotificationUseCase {

    private $data;
    private $platformRepository;
    private $notificator;

    public function __construct($data, IPlatformRepository $platformRepository, INotificationService $notificator) {
        $this->data = $data;
        $this->platformRepository = $platformRepository;
        $this->notificator = $notificator;
    }

    function sendNotification(){

        $platforms = $this->platformRepository->getAll();

        foreach($platforms as $platform){
            $this->notificator->sendNotification($this->data, $platform->name);
        }

            
    }
    
}