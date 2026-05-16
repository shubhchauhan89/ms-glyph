<?php
// admin_submit_color.php

// Receive color code from the admin dashboard
$colorCode = $_POST['colorCode'];

// Update the configuration file or database entry
// For example, you can store it in a configuration file
file_put_contents('button_color.txt', $colorCode);

echo "Color code updated successfully!";
?>
