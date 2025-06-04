<?php
session_start();
require_once 'includes/db.php';

// Check if user is logged in and is a landlord
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'landlord') {
    header("Location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $location = trim($_POST['location']);
    $price = floatval($_POST['price']);
    $bedrooms = intval($_POST['bedrooms']);
    $bathrooms = intval($_POST['bathrooms']);
    
    // Basic validation
    $errors = [];
    
    if (empty($title)) {
        $errors[] = "Title is required";
    }
    
    if (empty($description)) {
        $errors[] = "Description is required";
    }
    
    if (empty($location)) {
        $errors[] = "Location is required";
    }
    
    if ($price <= 0) {
        $errors[] = "Price must be greater than 0";
    }
    
    if ($bedrooms < 0) {
        $errors[] = "Number of bedrooms cannot be negative";
    }
    
    if ($bathrooms < 0) {
        $errors[] = "Number of bathrooms cannot be negative";
    }
    
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO housing_listings (user_id, title, description, location, price, bedrooms, bathrooms) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$_SESSION['user_id'], $title, $description, $location, $price, $bedrooms, $bathrooms]);
            
            $_SESSION['listing_message'] = "Listing created successfully!";
            header("Location: profile.php");
            exit();
        } catch (PDOException $e) {
            error_log("Error creating listing: " . $e->getMessage());
            $_SESSION['listing_message'] = "Error creating listing. Please try again.";
            header("Location: create_listing.php");
            exit();
        }
    } else {
        $_SESSION['listing_errors'] = $errors;
        header("Location: create_listing.php");
        exit();
    }
} else {
    header("Location: create_listing.php");
    exit();
}
?> 