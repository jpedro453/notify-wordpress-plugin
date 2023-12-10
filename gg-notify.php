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
require_once __DIR__ . '/inc/src/domain/entities/PasswordChange.php';
require_once __DIR__ . '/inc/src/application/services/platforms/DiscordPlatform.php';
require_once __DIR__ . '/inc/src/infra/controllers/PasswordChangeController/PasswordChangeController.php';

interface IPasswordChangeEntity {
    public string $ip;
    public string $date;
    public string $username;
    public string $email;
    public string $login_url;
}

class GG_Notify {

    function __construct() {
        register_activation_hook( __FILE__,  array($this, 'activate_plugin' ) );

        add_action('admin_menu', 'create_admin_menu');
        add_action('wp_login', array($this, 'your_function'), 10, 2);

    }
    function activate_plugin(){
        create_admin_menu();
    }
    function your_function($user_login, $user) {

        $user_ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i:s');


        $platforms = [];
        $discord_platform = new GG_DiscordPlatform('https://discord.com');
        array_push($platform, $discord_platform);

        $password_change = new GG_PasswordChange($user_ip, $date, $user_login, $user->ID, $user->user_email, 'wp-admin');
        $password_change_controller = new GG_PasswordChangeController($password_change, $platforms);

        $log_message = sprintf(
            'Usuário %s fez login. Informações do usuário: ID: %d, Nome: %s, Email: %s',
            $user_login,
            $user->ID,
            $user->display_name,
            $user->user_email
        );
        $this->log($log_message);
    }
    private function log($message) {
        $log_file = plugin_dir_path(__FILE__) . 'logs/plugin_log.txt';

        $log_message = '[' . date('Y-m-d H:i:s') . '] ' . $message .  "\n";

        error_log($log_message, 3, $log_file);
    }

    
}

new GG_Notify();

