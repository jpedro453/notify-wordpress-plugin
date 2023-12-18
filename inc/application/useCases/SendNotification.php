<?php

namespace inc\Application\UseCases;

use inc\application\interfaces\Platform\IPlatform;

class SendNotificationUseCase {

    public int $user_id;
    public IPlatform $platform;
    public string $message;

    public function __construct(int $user_id, IPlatform $platform, string $message) {
        $this->user_id = $user_id;
        $this->platform = $platform;
        $this->message = $message;
    }

    function execute(){
        if(!user_can($this->user_id, 'administrator')) return;
        
        // FIXME: it should be information on the arguments of sendNotification() 
        $this->platform->sendNotification($this->message);
    }
}