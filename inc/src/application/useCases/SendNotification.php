<?php

require_once __DIR__ . '/inc/src/application/services/platforms/Platform.php';

class GG_SendNotification {

    public IPlatform $platform;
    public string $message;

    public function __construct(IPlatform $platform, string $message) {
        $this->platform = $platform;
        $this->message = $message;
    }

    function execute(){
        // FIXME: it should be information on the arguments of sendNotification() 
        $this->platform->sendNotification($this->message);
    }
}