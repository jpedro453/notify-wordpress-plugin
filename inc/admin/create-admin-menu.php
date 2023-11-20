<?php 

require_once __DIR__ . '/admin-page.php'; 

function create_admin_menu() {
    $page_title = 'GG Notify';
    $menu_title = 'GG Notify';
    $capability = 'manage_options';
    $menu_slug = 'gg-notify-settings';
    $function = array(new GG_AdminPage, 'render');
    $icon_url = 'dashicons-admin-generic';
    $position = 6;

    add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
}