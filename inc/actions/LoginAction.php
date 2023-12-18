<?php

use inc\infra\database\PlatformsDatabase;
use inc\infra\repositories\PlatformsRepository;
use inc\infra\services\platforms\DiscordPlatform;

add_action('wp_login', function($user_login, $user) {

    $database = new PlatformsDatabase(); 
    $platforms_repository = new PlatformsRepository($database); 

    $platforms = $platforms_repository->getAll();

    foreach($platforms as $platform){
        if($platform['platform_name'] == 'discord'){
            $webhook_url = json_decode($platform->details);
            $service = new DiscordPlatform($webhook_url);



        }
    }

}, 10,2);