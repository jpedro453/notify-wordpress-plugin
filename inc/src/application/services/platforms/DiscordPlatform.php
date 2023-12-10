<?php

 require_once __DIR__ . '/inc/src/application/controllers/platforms/Platform.php';

if(!class_exists("GG_DiscordPlatform")){
    class GG_DiscordPlatform implements IPlatform{

        public string $webhook_url;

        public function __construct(string $webhook_url){
            $this->webhook_url = $webhook_url;
        }
        // FIXME: it should be information on the arguments of sendNotification() 
        public function sendNotification(String $message){

        }
    }
}