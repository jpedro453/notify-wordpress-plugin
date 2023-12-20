<?php
/*
* Plugin Name:       GG NOTIFY
* Plugin URI:        https://glorium.com.br
* Description:       Notify.
* Version:           1.0
* Requires at least: 5.2
* Requires PHP:      7.4
* Author:            João Pedro
*/

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
// require_once plugin_dir_path(__FILE__) . 'admin/Adminpage.php';

use inc\Infra\Database\PlatformsDatabase;
use inc\Infra\Database\WPDataBase;
use admin\AdminPage;
use inc\Application\UseCases\sendNotificationUseCase;
use inc\infra\repositories\PlatformsRepository;
use inc\infra\services\platforms\DiscordPlatform;

class GG_Notify {

    function __construct() {
        $this->init();
    }
    function init() {
        global $wpdb;
        $discord = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}gg_notify WHERE platform_name = 'discord'")[0];
        $webhook_url = json_decode($discord->details);



        $platform = new PlatformsDatabase();
        $repository = new PlatformsRepository($platform);
        $discordPlatform = new DiscordPlatform($webhook_url->webhook_url);

        $usecase = new sendNotificationUseCase(array(), $repository , $discordPlatform);
        // $usecase->sendNotification();
        // $resultado = $discordPlatform->sendNotification('a');

        // $database = new WPDataBase();
        // $database->init();
           


        $admin_page = new AdminPage();
        add_action('admin_menu', function () use ($admin_page) {
            $admin_page->createMenu();
        });
        
    }

    
}

$gg_notify = new GG_Notify();
// register_activation_hook(__FILE__, array($gg_notify, 'activate'));


