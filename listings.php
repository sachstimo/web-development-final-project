<?php
session_start();
require_once 'includes/db.php';

// Get all available listings
$query = "SELECT h.*, u.username, u.email 
          FROM housing_listings h 
          JOIN users u ON h.user_id = u.id 
          WHERE h.is_available = 1 
          ORDER BY h.created_at DESC";

$result = mysqli_query($conn, $query);

if (!$result) {
    error_log("Error fetching listings: " . mysqli_error($conn));
    $listings = [];
} else {
    $listings = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $listings[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Housing Listings - EsadeMoves</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1>EsadeMoves</h1>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="listings.php">Housing</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="profile.php">My Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main class="container">
        <section class="listings-section">
            <h2>Available Housing</h2>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="add-listing">
                    <a href="create_listing.php" class="btn btn-primary">Add New Listing</a>
                </div>
            <?php endif; ?>

            <div class="listings-grid">
                <?php if (empty($listings)): ?>
                    <p class="no-results">No housing listings available at the moment.</p>
                <?php else: ?>
                    <?php foreach ($listings as $listing): ?>
                        <div class="listing-card">
                            <h3><?php echo htmlspecialchars($listing['title']); ?></h3>
                            <p class="location"><?php echo htmlspecialchars($listing['location']); ?></p>
                            <p class="description"><?php echo htmlspecialchars($listing['description']); ?></p>
                            <div class="listing-details">
                                <p class="price">€<?php echo number_format($listing['price'], 2); ?>/month</p>
                                <p class="bedrooms"><?php echo $listing['bedrooms']; ?> bedrooms</p>
                                <p class="bathrooms"><?php echo $listing['bathrooms']; ?> bathrooms</p>
                            </div>
                            <div class="listing-contact">
                                <p>Contact: <?php echo htmlspecialchars($listing['username']); ?></p>
                                <a href="mailto:<?php echo htmlspecialchars($listing['email']); ?>" class="btn btn-secondary">Contact Owner</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> EsadeMoves. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 