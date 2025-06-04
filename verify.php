<?php
session_start();
include 'includes/db.php';

// Get username and password from form
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];

// Basic query with some SQL injection protection
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (!$result) {
    header("Location: query_error.html");
    exit();
}

if (mysqli_num_rows($result) == 0) {
    header("Location: login.php?error=1");
    exit();
}

$user = mysqli_fetch_assoc($result);

// Verify password
if (password_verify($password, $user['password'])) {
    // Set session variables
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_type'] = $user['user_type'];
    
    header("Location: index.php");
} else {
    header("Location: login.php?error=1");
}

mysqli_close($conn);
?> 