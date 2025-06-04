<?php

session_start();

// Simple environment check (you'll change this one value when uploading to Plesk)
$is_local = false;  // Change to false when uploading to Plesk

// Database credentials
if ($is_local) {
    // Local MAMP settings
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'esademoves';
    $db_port = 3306;
} else {
    // Plesk settings - update these with your Plesk credentials
    $db_host = 'localhost';
    $db_user = 'admin_moves';
    $db_pass = 'esademoves123456789';
    $db_name = 'admin_esademoves';
    $db_port = 3306;  // Plesk port from the connection information
}

// Simple database connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);

// Check connection - basic error handling
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set character encoding to UTF-8
mysqli_set_charset($conn, "utf8");

?> 