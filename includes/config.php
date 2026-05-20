<?php
/**
 * MS Glyph - Silent Execution Engine
 * Global Settings Configuration
 */

// Include DB connection
require_once __DIR__ . '/db.php';

// Default / Hardcoded Configuration (Fallback if DB fails)
$agency_blueprint = [
    'agency_name' => 'MS Glyph',
    'address' => 'Block C, Yamuna Vihar, Delhi, 110053',
    'primary_email' => 'hello@msglyph.com',
    'service_area' => 'Delhi NCR',
    'agency_description' => 'MS Glyph is a premier creative studio where visual precision meets editorial power. We act as the elite silent partner and extended execution arm for consultants, local leaders, and global brands.',
    'social_linkedin' => 'https://linkedin.com/company/msglyph',
    'social_instagram' => 'https://instagram.com/msglyph'
];

// Attempt to override with database configuration
if ($agency_blueprint_conn) {
    try {
        $stmt = $agency_blueprint_conn->query("SELECT * FROM settings LIMIT 1");
        if ($stmt) {
            $db_settings = $stmt->fetch();
            if ($db_settings) {
                // Merge DB settings dynamically. Example columns: setting_key, setting_value
                // Assuming a key-value store for global_settings table:
                /*
                $stmt = $agency_blueprint_conn->query("SELECT setting_key, setting_value FROM global_settings");
                while($row = $stmt->fetch()) {
                    $agency_blueprint[$row['setting_key']] = $row['setting_value'];
                }
                */
                // Or assuming a single row with column names matching the keys
                $agency_blueprint['agency_name'] = $db_settings['site_name'] ?? $agency_blueprint['agency_name'];
                $agency_blueprint['address'] = $db_settings['address'] ?? $agency_blueprint['address'];
                $agency_blueprint['primary_email'] = $db_settings['email'] ?? $agency_blueprint['primary_email'];
                $agency_blueprint['service_area'] = $db_settings['service_area'] ?? $agency_blueprint['service_area'];
                $agency_blueprint['agency_description'] = $db_settings['agency_description'] ?? $agency_blueprint['agency_description'];
                $agency_blueprint['social_linkedin'] = $db_settings['linkedin'] ?? $agency_blueprint['social_linkedin'];
                $agency_blueprint['social_instagram'] = $db_settings['instagram'] ?? $agency_blueprint['social_instagram'];
            }
        }
    } catch (PDOException $e) {
        // Log query execution error silently
        error_log("Settings Retrieval Error: " . $e->getMessage());
    }
}

// Global scope convenience variables for views
$site_name = $agency_blueprint['agency_name'];
$site_address = $agency_blueprint['address'];
$site_email = $agency_blueprint['primary_email'];
$site_area = $agency_blueprint['service_area'];
$site_description = $agency_blueprint['agency_description'];
$site_linkedin = $agency_blueprint['social_linkedin'];
$site_instagram = $agency_blueprint['social_instagram'];
?>
