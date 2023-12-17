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
// namespace GG_NOTIFY;

// require_once __DIR__ . '/admin/create-admin-menu.php';
require_once __DIR__ . '/src/infra/database/WPDatabase.php';

use Infra\Services\Platforms\GG_DiscordPlatform;
use Infra\Controllers\GG_PasswordChangeController;
use Domain\Entities\GG_PasswordChange;



class GG_Notify {

    function __construct() {
        register_activation_hook( __FILE__,  array($this, 'activate_plugin' ) );

        // add_action('admin_menu', 'create_admin_menu');
        add_action('wp_login', array($this, 'your_function'), 10, 2);
        $this->init();

    }
    function activate_plugin(){
        // create_admin_menu();
    }
    function init(){
        $database = new Src\Infra\Database\GG_WPDataBase();
        $database->init(); 
    }
    function your_function($user_login, $user) {


    }

    
}

    new GG_Notify();


