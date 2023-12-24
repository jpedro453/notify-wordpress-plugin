<?php

namespace inc\infra\services\platforms;

use inc\Domain\Interfaces\Services\INotificatorService;
use inc\Infra\Services\EmailPlatform;
use inc\Infra\Services\Platforms\DiscordPlatform;

class Notificator implements INotificatorService{


    private $name;
    private $details;
    
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

    public function sendNotification() {

        $platform = $this->platformMap($this->name, $this->details);

        if ($platform) {
            $platform->sendNotification();
        } else {
            return "Objeto não encontrado para o nome: $this->name";
        }
    }
}