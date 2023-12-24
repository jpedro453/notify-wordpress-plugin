<?php

use inc\Infra\Database\PlatformsDatabase;
use inc\Infra\Repositories\PlatformsRepository;
use inc\Infra\Controllers\ActionsController;

add_action('wp_login', function($user_login, $user) {

    $database = new PlatformsDatabase(); 
    $platforms_repository = new PlatformsRepository($database); 

    $controller = new ActionsController($user, $platforms_repository);
            

}, 10,2);