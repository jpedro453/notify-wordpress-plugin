<?php

namespace inc\Infra\Database;

use inc\Domain\Interfaces\Database\IPlatformDatabase;

class PlatformsDatabase implements IPlatformDatabase{
    
    public function getAllPlatforms() {
        global $wpdb;
        $platforms = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}gg_notify WHERE active = true");

        return $platforms;
    }
    public function getByName($name) {
        global $wpdb;
        $table_name = $wpdb->prefix . "gg_notify";
        
        $existing_platform = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE platform_name = %s", $name));
        
        return $existing_platform;
        
    }

    public function getDetail($name, $detail) {
        global $wpdb;
        $table_name = $wpdb->prefix . "gg_notify";

        $sql = $wpdb->prepare(
            "SELECT DISTINCT json_unquote(json_extract(details, '$.\"$detail\"')) AS key_result
            FROM $table_name
            WHERE platform_name = %s;",
            $name
        );
        return $wpdb->get_var($sql);
    }
    
    public function updatePlatform($platformName, $active, $details) {
        global $wpdb;
        $table_name = $wpdb->prefix . "gg_notify";

        $existingPlatform = $this->getByName($platformName);

        if (!$existingPlatform) return;

        $result = $wpdb->update(
            $table_name,
            array(
                'active' => true, // Você pode ajustar conforme necessário
                'details' => $details
            ),
            array('platform_name' => $platformName)
        );

        return $result !== false;
        

    }

    public function deletePlatform($name) {
        global $wpdb;
        $table_name = $wpdb->prefix . "gg_notify";
        
        $existing_platform = $wpdb->get_row($wpdb->prepare("DELETE * FROM $table_name WHERE platform_name = %s", $name));
        
        return $existing_platform;
    }

    public function createPlatform($platformName, $details) {
        global $wpdb;
        $table_name = $wpdb->prefix . "gg_notify";


        $existing_platform = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE platform_name = %s", $platformName));

        if($existing_platform) return;

        $result = $wpdb->insert(
            $table_name,
            array(
                'platform_name' => $platformName,
                'active' => true,
                'details' => $details
            )
        );
        return $result;

    }
}