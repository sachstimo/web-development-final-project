<?php

session_start();

$is_local = false; 

// Database credentials
if ($is_local) {
    // Local MAMP settings
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'esademoves';
    $db_port = 3306;
	
} else {
	
    $db_host = 'localhost';
    $db_user = 'admin_moves';
    $db_pass = 'esademoves123456789';
    $db_name = 'admin_esademoves';
    $db_port = 3306; 
}

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

?> 