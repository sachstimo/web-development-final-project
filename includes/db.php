<?php

session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Simple database connection using socket
$conn = mysqli_connect(
    '127.0.0.1',  // Use IP instead of localhost
    'root',       // default MAMP username
    'root',       // default MAMP password
    'esademoves'  // database name
);

// Check connection - basic error handling
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set character encoding to UTF-8
mysqli_set_charset($conn, "utf8");

?> 