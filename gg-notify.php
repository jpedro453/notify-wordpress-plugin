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

use inc\Infra\Database\WPDataBase;
use admin\AdminPage;
class GG_Notify {

    function __construct() {
        $this->init();
    }
    function init() {
        
        $database = new WPDataBase();
        $database->init();

        $admin_page = new AdminPage();
        add_action('admin_menu', function () use ($admin_page) {
            $admin_page->createMenu();
        });
        
    }

    
}

$gg_notify = new GG_Notify();
// register_activation_hook(__FILE__, array($gg_notify, 'activate'));


