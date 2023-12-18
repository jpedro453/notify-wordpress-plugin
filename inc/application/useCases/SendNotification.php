<?php

namespace inc\Application\UseCases;

use inc\application\interfaces\Platform\IPlatform;

class SendNotificationUseCase {

    public \WP_User $user;
    public IPlatform $platform;

    public function __construct(\WP_User $user, IPlatform $platform) {
        $this->user = $user;
        $this->platform = $platform;
    }

    function execute(){
        if(!user_can($this->user->ID, 'administrator')) return;
        
        // FIXME: it should be information on the arguments of sendNotification() 
        $this->platform->sendNotification('');
    }
}