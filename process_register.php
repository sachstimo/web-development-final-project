<?php
session_start();
require_once 'includes/db.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    $firstname = mysqli_real_escape_string($conn, trim($_POST['firstname']));
    $lastname = mysqli_real_escape_string($conn, trim($_POST['lastname']));
    $program = isset($_POST['program']) ? mysqli_real_escape_string($conn, trim($_POST['program'])) : null;
    $looking_for_roommate = isset($_POST['looking_for_roommate']) ? 1 : 0;
    
    // Basic validation
    $errors = [];
    
    // Validate username
    if (empty($username)) {
        $errors[] = "Username is required";
    } elseif (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters long";
    }
    
    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long";
    }
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }
    
    // Validate student-specific fields
    if ($user_type === 'student' && empty($program)) {
        $errors[] = "Please select your ESADE program";
    }
    
    // If no errors, proceed with registration
    if (empty($errors)) {
        // Check if username or email already exists
        $check_query = "SELECT COUNT(*) as count FROM users WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn, $check_query);
        $row = mysqli_fetch_assoc($result);
        
        if ($row['count'] > 0) {
            $errors[] = "Username or email already exists";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert new user
            $insert_query = "INSERT INTO users (username, email, password, user_type, firstname, lastname, program, looking_for_roommate) 
                           VALUES ('$username', '$email', '$hashed_password', '$user_type', '$firstname', '$lastname', " . 
                           ($program ? "'$program'" : "NULL") . ", $looking_for_roommate)";
            
            if (mysqli_query($conn, $insert_query)) {
                // Set session variables
                $_SESSION['user_id'] = mysqli_insert_id($conn);
                $_SESSION['username'] = $username;
                $_SESSION['user_type'] = $user_type;
                
                header("Location: home.php");
                exit();
            } else {
                error_log("Registration error: " . mysqli_error($conn));
                header("Location: query_error.html");
                exit();
            }
        }
    }
    
    // If there are errors, redirect back to registration page with error message
    if (!empty($errors)) {
        $_SESSION['register_errors'] = $errors;
        header("Location: register.php");
        exit();
    }
} else {
    // If not a POST request, redirect to registration page
    header("Location: register.php");
    exit();
}
?> 