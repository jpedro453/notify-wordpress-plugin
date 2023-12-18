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
use inc\infra\services\platforms\DiscordPlatform;

class GG_Notify {

    function __construct() {
        $this->init();
    }
    function init() {
        global $wpdb;
        $discord = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}gg_notify WHERE platform_name = 'discord'")[0];
        $webhook_url = json_decode($discord->details);
        var_dump($webhook_url);

        $discordPlatform = new DiscordPlatform($webhook_url->webhook_url);
        // $resultado = $discordPlatform->sendNotification('a');

        // $database = new WPDataBase();
        // $database->init();
        $platform = new PlatformsDatabase();
           


        $admin_page = new AdminPage();
        add_action('admin_menu', function () use ($admin_page) {
            $admin_page->createMenu();
        });
        
    }

    
}

$gg_notify = new GG_Notify();
// register_activation_hook(__FILE__, array($gg_notify, 'activate'));


