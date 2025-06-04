<?php
session_start();
require_once 'includes/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user data
$query = "SELECT * FROM users WHERE id = " . $_SESSION['user_id'];
$result = mysqli_query($conn, $query);

if (!$result) {
    error_log("Error fetching user data: " . mysqli_error($conn));
    header("Location: query_error.html");
    exit();
}

$user = mysqli_fetch_assoc($result);
if (!$user) {
    header("Location: logout.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - EsadeMoves</title>
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
                <li><a href="profile.php">My Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <section class="profile-section">
            <h2>My Profile</h2>
            
            <?php if (isset($_SESSION['profile_message'])): ?>
                <div class="message">
                    <?php 
                    echo $_SESSION['profile_message'];
                    unset($_SESSION['profile_message']);
                    ?>
                </div>
            <?php endif; ?>

            <div class="profile-container">
                <div class="profile-info">
                    <h3>Personal Information</h3>
                    <form action="update_profile.php" method="POST" class="profile-form">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($user['firstname']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($user['lastname']); ?>" required>
                        </div>
                        
                        <?php if ($user['user_type'] === 'student'): ?>
                        <div class="form-group">
                            <label for="program">ESADE Program:</label>
                            <select id="program" name="program" required>
                                <option value="bachelor" <?php echo $user['program'] === 'bachelor' ? 'selected' : ''; ?>>Bachelor</option>
                                <option value="master" <?php echo $user['program'] === 'master' ? 'selected' : ''; ?>>Master</option>
                                <option value="mba" <?php echo $user['program'] === 'mba' ? 'selected' : ''; ?>>MBA</option>
                                <option value="executive" <?php echo $user['program'] === 'executive' ? 'selected' : ''; ?>>Executive Education</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="looking_for_roommate" value="1" <?php echo $user['looking_for_roommate'] ? 'checked' : ''; ?>>
                                I am looking for a roommate
                            </label>
                        </div>
                        <?php endif; ?>
                        
                        <button type="submit" class="btn">Update Profile</button>
                    </form>
                </div>

                <?php if ($user['user_type'] === 'landlord'): ?>
                <div class="my-listings">
                    <h3>My Listings</h3>
                    <a href="create_listing.php" class="btn">Create New Listing</a>
                    <?php
                    $listings_query = "SELECT * FROM housing_listings WHERE user_id = " . $_SESSION['user_id'] . " ORDER BY created_at DESC";
                    $listings_result = mysqli_query($conn, $listings_query);
                    
                    if (!$listings_result) {
                        error_log("Error fetching listings: " . mysqli_error($conn));
                        echo "<p>Error loading listings. Please try again later.</p>";
                    } else {
                        if (mysqli_num_rows($listings_result) > 0): ?>
                            <div class="listings-grid">
                                <?php while ($listing = mysqli_fetch_assoc($listings_result)): ?>
                                    <div class="listing-card">
                                        <h4><?php echo htmlspecialchars($listing['title']); ?></h4>
                                        <p class="location"><?php echo htmlspecialchars($listing['location']); ?></p>
                                        <p class="price">€<?php echo number_format($listing['price'], 2); ?>/month</p>
                                        <div class="listing-actions">
                                            <a href="edit_listing.php?id=<?php echo $listing['id']; ?>" class="btn">Edit</a>
                                            <a href="delete_listing.php?id=<?php echo $listing['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this listing?')">Delete</a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <p>You haven't created any listings yet.</p>
                        <?php endif;
                    }
                    ?>
                </div>
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