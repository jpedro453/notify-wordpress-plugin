<?php

namespace inc\Application\UseCases;

use inc\Domain\Interfaces\Database\IPlatformRepository;
use inc\Domain\Interfaces\Services\INotificatorService;

class sendNotificationUseCase {

    private $data;
    private $platformRepository;
    private $notificator;

    public function __construct($data, IPlatformRepository $platformRepository, INotificatorService $notificator) {
        $this->data = $data;
        $this->platformRepository = $platformRepository;
        $this->notificator = $notificator;
    }

    function sendNotification(){

        $platforms = $this->platformRepository->getAll();

        foreach($platforms as $platform){
            $this->notificator->sendNotification($platform->platform_name, $platform->details);
        }

            
    }
    
}