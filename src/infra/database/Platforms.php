<?php

use Application\Interfaces\IPlatformDatabase;

class GG_PlatformsDatabase implements IPlatformDatabase{
    
    public function getAllPlatforms() {
        // Implementação...
    }

    public function updatePlatform() {
        // Implementação...
    }

    public function deletePlatform() {
        // Implementação...
    }

    public function createPlatform($platformName, $details) {
        global $wpdb;
        $table_name = $wpdb->prefix . "gg_notify";


        $existing_platform = $wpdb->get_row("SELECT * FROM $table_name WHERE platform_name = $platformName");

        if (!$existing_platform) {
            $wpdb->insert(
                $table_name,
            );
        }

    }
}