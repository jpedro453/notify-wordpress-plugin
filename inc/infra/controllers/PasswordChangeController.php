<?php

namespace Infra\Controllers;

use inc\Domain\Entities\PasswordChange;
use inc\Application\Interfaces\Platform\IPlatform;
use inc\Application\UseCases\SendNotificationUseCase;

class PasswordChangeController {

    public $password_change;
    public $user_id;

    public array $platforms = [];

    public function __construct(PasswordChange $password_change, array $platforms) {
        $this->password_change = $password_change;
        $this->user_id = $password_change->user_id;

        foreach ($platforms as $platform) {
            if (!($platform instanceof IPlatform)) {
                return false;
            }
        }

        $this->platforms = $platforms;
    }

    public function handle(){
        
        foreach ($this->platforms as $platform) {
            // FIXME: it should be information on the arguments of sendNotification() 
            $notificator = new SendNotificationUseCase($this->user_id, $platform, 'mensagem');
            $notificator->execute();
        }
    }
}