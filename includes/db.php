<?php
/**
 * MS Glyph - Silent Execution Engine
 * Database Connection Module
 */

// Database configuration
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'ms_glyph';

try {
    // Establish PDO connection
    $agency_blueprint_conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    
    // Set error mode to Exception for high-fidelity debugging
    $agency_blueprint_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set default fetch mode to associative array
    $agency_blueprint_conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Silent fail for production: DO NOT expose DB errors to the user.
    // Instead, log the error internally and continue execution with default states.
    error_log("MS Glyph Core Execution Error: " . $e->getMessage());
    $agency_blueprint_conn = null;
}
?>
