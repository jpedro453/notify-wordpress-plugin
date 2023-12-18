<?php

namespace admin;

use inc\infra\database\PlatformsDatabase;
use inc\infra\repositories\PlatformsRepository;

$platforms = array();

if (isset($_POST['discord'])) {
    $discord = array(
        'name' => 'discord',
        'details' => array(
           'webhook_url' => $_POST['webhook_discord'] ?? null
        )
    );

    array_push($platforms, $discord);
}

function ef_handle_submit($platforms) {
    $database = new PlatformsDatabase();
    $repository = new PlatformsRepository($database);

    foreach ($platforms as $platform) {
        $repository->create($platform['name'], json_encode($platform['details']));
    }
}

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ef_handle_submit($platforms);
}

class AdminPage {
    function createMenu(){
        $page_title = 'GG Notify';
        $menu_title = 'GG Notify';
        $capability = 'manage_options';
        $menu_slug = 'gg-notify-settings';
        $function = array(new AdminPage, 'render');
        $icon_url = 'dashicons-admin-generic';
        $position = 6;
    
        add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
    }
    function render() { 
        ?>
        <div id="ef-admin-page">
            <div class="ef-tabs">
                <button class="ef-tab">Ações</button>
                <button class="ef-tab">Configurações</button>
                <button class="ef-tab">Informações</button>
            </div>
        </div>
        <form id="ef-form" method="POST">
            <input type="checkbox" name="discord" id="ef-discord-checkbox">
            <label for="ef-discord-checkbox">Discord</label>
            <input type="text" name="webhook_discord" id="ef-discord" placeholder="Webhook do Discord">
            
            <!-- <input type="checkbox" name="email" id="ef-email-checkbox">
            <label for="ef-email-checkbox">Email</label>
            <input type="text" name="receptor_email" id="ef-email" placeholder="Recebedor do email"> -->

            <input type="submit" value="Save">
        </form>
        <?php 
    }

    function load_admin_style($hook) {
        if ($hook != 'toplevel_page_gg-notify-settings') {
            return;
        }

        $style_url = plugin_dir_url(__DIR__) . '/assets/admin/css/styles.css';
        wp_enqueue_style('gg_admin_css', $style_url, false, '1.0.0');
    }
    function load_admin_scripts($hook) {
        if ($hook != 'toplevel_page_gg-notify-settings') {
            return;
        }

        $script_url = plugin_dir_url(__DIR__) . '/assets/admin/js/admin.js';
        wp_enqueue_script('gg_admin_js', $script_url, array('jquery'), '1.0.0', true);
    }
}

// Instantiate the class
$gg_admin_page = new AdminPage();

add_action('admin_enqueue_scripts', array($gg_admin_page, 'load_admin_style'));
add_action('admin_enqueue_scripts', array($gg_admin_page, 'load_admin_scripts'));