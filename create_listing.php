<?php
session_start();
require_once 'includes/db.php';

// Check if user is logged in and is a landlord
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'landlord') {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Listing - EsadeMoves</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1>EsadeMoves</h1>
            </div>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="listings.php">Housing</a></li>
                <li><a href="profile.php">My Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <section class="create-listing-section">
            <h2>Create New Listing</h2>
            
            <?php if (isset($_SESSION['listing_message'])): ?>
                <div class="message">
                    <?php 
                    echo $_SESSION['listing_message'];
                    unset($_SESSION['listing_message']);
                    ?>
                </div>
            <?php endif; ?>

            <form class="listing-form" action="process_listing.php" method="POST">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="5" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>
                </div>
                
                <div class="form-group">
                    <label for="price">Price per month (€):</label>
                    <input type="number" id="price" name="price" min="0" step="0.01" required>
                </div>
                
                <div class="form-group">
                    <label for="bedrooms">Number of Bedrooms:</label>
                    <input type="number" id="bedrooms" name="bedrooms" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="bathrooms">Number of Bathrooms:</label>
                    <input type="number" id="bathrooms" name="bathrooms" min="0" required>
                </div>
                
                <button type="submit" class="btn">Create Listing</button>
            </form>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <script>document.write(new Date().getFullYear())</script> EsadeMoves. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 