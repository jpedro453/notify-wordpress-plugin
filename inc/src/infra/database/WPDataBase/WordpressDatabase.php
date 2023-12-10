<?php

class GG_WPDataBase{
    
    public function init(){
        global $wpdb;
        $table_name = $wpdb->prefix . "gg_notify";

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

            $charset_collate = $wpdb->get_charset_collate();
            $sql = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                // Adicione suas colunas aqui
                PRIMARY KEY  (id)
            ) $charset_collate;";

            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
            dbDelta($sql);
        }
    }

    function create_platform(){
        global $wpdb;
        $table_name = $wpdb->prefix . "gg_notify";


        $existing_platform = $wpdb->get_row("SELECT * FROM $table_name WHERE platform_name = 'discord'");

        if (!$existing_platform) {
            $wpdb->insert(
                $table_name,
                array(
                    'platform_name' => 'discord',
                    'status' => true, 
                    'webhook' => 'sua_url_do_webhook_aqui',
                ),
                array('%s', '%d', '%s')
            );
        }

    }

}