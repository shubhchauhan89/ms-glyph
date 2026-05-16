<?php
ob_start(); // Buffering output

// Include header and connection files


// Start session
session_start();

// Check if the admin session is empty
if(empty($_SESSION['ad_id'])){
    // Unset and destroy the session
    session_unset();
    session_destroy();
    // Redirect to login page
    header("Location: login.php");
    exit(); // Terminate script execution
}

$a=1; // This variable seems unused, consider removing it

// Page content starts here
?>