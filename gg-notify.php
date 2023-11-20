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

require_once __DIR__ . '/inc/admin/create-admin-menu.php';

class GG_Notify {

    function __construct() {
        register_activation_hook( __FILE__,  array($this, 'activate_plugin' ) );

        add_action('admin_menu', 'create_admin_menu');

    }
    function activate_plugin(){
        create_admin_menu();
    }

    
}

new GG_Notify();

