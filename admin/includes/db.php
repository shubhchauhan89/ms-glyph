<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "u142085228_msglyph";
$dbPassword = "Shubh@8937";
$dbName     = "u142085228_msglyph";


// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>