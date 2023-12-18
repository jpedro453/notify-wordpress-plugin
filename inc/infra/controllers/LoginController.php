<?php

namespace Infra\Controllers;

use inc\Application\UseCases\SendNotificationUseCase;
use inc\infra\database\PlatformsDatabase;
use inc\infra\repositories\PlatformsRepository;
use inc\infra\services\platforms\DiscordPlatform;
use WP_User;

class LoginController {
    public $user;

    public function __construct(WP_User $user) {
        $this->user = $user;
    }

    public function execute(){
        $platforms = $this->determinePlatforms();
        foreach($platforms as $platform){
            $sendNotificationUseCase = new SendNotificationUseCase($this->user, $platform);
            $result = $sendNotificationUseCase->execute();
        }
        
    }

    private function determinePlatforms() {
        $platforms = [];

        $database = new PlatformsDatabase(); 
        $repository = new PlatformsRepository($database); 

        $platformRecords = $repository->getAll();
    
        foreach ($platformRecords as $platformRecord) {
            $platform = $this->createPlatformService($platformRecord);
            $platforms[] = $platform;
        }
    
        return $platforms;
    }
    private function createPlatformService($platformRecord) {
        if($platformRecord['platform_name'] == 'discord'){
            $webhook_url = json_decode($platformRecord->details);
            return new DiscordPlatform($webhook_url);
        }
    }    

}