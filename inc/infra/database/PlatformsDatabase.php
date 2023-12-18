<?php

namespace inc\infra\database;

use inc\application\interfaces\Platform\IPlatformDatabase;

class PlatformsDatabase implements IPlatformDatabase{
    
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


        $existing_platform = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE platform_name = %s", $platformName));


        if (!$existing_platform) {
            $result = $wpdb->insert(
                $table_name,
                array(
                    'platform_name' => $platformName,
                    'details' => $details
                )
            );
            return $result;
        }

    }
}