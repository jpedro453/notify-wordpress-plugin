<?php

namespace inc\infra\services\platforms;

use inc\Domain\Interfaces\Services\INotificatorService;
use inc\Infra\Services\Platforms\EmailPlatform;
use inc\Infra\Services\Platforms\DiscordPlatform;

class Notificator implements INotificatorService{


    private $title;
    private $description;
    
    private function platformMap($name, $details) {

        $platformObjects = array(
            "discord" => new DiscordPlatform($details),
            "email" => new EmailPlatform($details),
        );

        if (array_key_exists($name, $platformObjects)) {
            return $platformObjects[$name];
        } else {
            return null;
        }
    }

    public function sendNotification($name, $details) {

        $platform = $this->platformMap($name, $details);

        if(!$platform) return "Objeto não encontrado para o nome: $name";
        
        $platform->sendNotification($this->title, $this->description);
        
    }
}