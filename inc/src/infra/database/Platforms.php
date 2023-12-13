<?php

interface IPlatformRepository {
    public function GetAll();
    public function Create();
    public function Update();
    public function Delete();
}

class GG_PlatformsDatabase{
    function Create(){
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