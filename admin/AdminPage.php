<?php

namespace admin;

use inc\Infra\Database\PlatformsDatabase;
use inc\Infra\Repositories\PlatformsRepository;

$platforms = array();

function isPlatformActive($platformName) {
    $database = new PlatformsDatabase();
    $repository = new PlatformsRepository($database);

    $existingPlatform = $repository->getByName($platformName);

    return $existingPlatform->active ? true : false;
}

function getWebhookUrl($platformName) {
    $database = new PlatformsDatabase();
    $repository = new PlatformsRepository($database);

    $existingPlatform = $repository->getByName($platformName);

    return $existingPlatform ? json_decode($existingPlatform->details)->webhook_url : '';
}


$discord = array(
    'name' => 'discord',
    'active' => isset($_POST['discord']) ? true : false,
    'details' => array(
        'webhook_url' => $_POST['webhook_discord'] ?? null
    )
);

array_push($platforms, $discord);


function ef_handle_submit($platforms) {
    $database = new PlatformsDatabase();
    $repository = new PlatformsRepository($database);

    foreach ($platforms as $platform) {
        $platformName = $platform['name'];
        $active = $platform['active'];
        $details = json_encode($platform['details']);

        $existingPlatform = $repository->getByName($platformName);

        if ($existingPlatform) {
            $repository->update($platformName, $active, $details);
        } else {
            $repository->create($platformName, $details);
        }
    }
}


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

        $isDiscordActive = isPlatformActive('discord');
        $webhookDiscord = $isDiscordActive ? getWebhookUrl('discord') : '';
        // get_template_part(plugin_dir_path(__FILE__) . "/form/AdminForm", null, array( "platforms" => $platforms));
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