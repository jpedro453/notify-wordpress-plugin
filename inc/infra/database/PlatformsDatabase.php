<?php

namespace inc\infra\database;

use inc\domain\interfaces\Database\IPlatformDatabase;

class PlatformsDatabase implements IPlatformDatabase{
    
    public function getAllPlatforms() {
        global $wpdb;
        $platforms = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}gg_notify");

        return $platforms;
    }
    public function getByName($name) {
        global $wpdb;
        $table_name = $wpdb->prefix . "gg_notify";
        
        $existing_platform = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE platform_name = %s", $name));
        
        return $existing_platform;
        
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