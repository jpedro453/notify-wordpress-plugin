<?php


class GG_AdminPage {
    function render() { 
        ?>
        <div id="ef-admin-page">
            <div class="ef-tabs">
                <button class="ef-tab">Configurações</button>
                <button class="ef-tab">Informações</button>
            </div>
        </div>
        <div id="ef-form">
            <input type="checkbox" name="discord_checkbox" id="ef-discord-checkbox">
            <label for="ef-discord-checkbox">Discord</label>
            <input type="text" name="webhook_discord" id="ef-discord" placeholder="Webhook do Discord">
        </div>
        <?php 
    }

    function load_admin_style($hook) {
        if ($hook != 'toplevel_page_gg-notify-settings') {
            return;
        }

        $style_url = plugin_dir_url(__DIR__) . '../assets/admin/css/styles.css';
        wp_enqueue_style('gg_admin_css', $style_url, false, '1.0.0');
    }
}

// Instantiate the class
$gg_admin_page = new GG_AdminPage();

// Hook the load_admin_style function to admin_enqueue_scripts
add_action('admin_enqueue_scripts', array($gg_admin_page, 'load_admin_style'));
