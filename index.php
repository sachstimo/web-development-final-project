<?php
session_start();
$logged_in = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EsadeMoves - Student Housing Made Easy</title>
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
                <?php if ($logged_in): ?>
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
        <section class="hero">
            <h2>Welcome to EsadeMoves</h2>
            <p>Your trusted platform for finding student housing in Barcelona</p>
            <div class="cta-buttons">
                <a href="listings.php" class="btn btn-primary">Find Housing</a>
                <?php if (!$logged_in): ?>
                    <a href="register.php" class="btn btn-secondary">Join Now</a>
                <?php endif; ?>
            </div>
        </section>

        <section class="features">
            <h3>Why Choose EsadeMoves?</h3>
            <div class="feature-grid">
                <div class="feature-card">
                    <h4>ESADE Community</h4>
                    <p>Connect with fellow ESADE students for trusted housing options.</p>
                </div>
                <div class="feature-card">
                    <h4>Easy Process</h4>
                    <p>Simple and straightforward process to find your perfect student accommodation.</p>
                </div>
                <div class="feature-card">
                    <h4>Verified Listings</h4>
                    <p>All listings are verified by our community to ensure quality.</p>
                </div>
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