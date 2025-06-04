<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// First try to connect without database
$conn = mysqli_connect('127.0.0.1', 'root', 'root', '');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Try to create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS esademoves";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully or already exists<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

// Select the database
mysqli_select_db($conn, 'esademoves');

// Import the database structure
$sql = file_get_contents('database.sql');
if (mysqli_multi_query($conn, $sql)) {
    echo "Database tables created successfully<br>";
} else {
    echo "Error creating tables: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);

echo "<br><a href='index.php'>Go back to homepage</a>";
?> 