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
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
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

        <section class="live-counter">
            <h3><br>Live Statistics</h3>
            <div class="feature-grid">
                <div class="feature-card">
                    <h4>Total Listings</h4>
                    <p id="total-listings">432</p>
                </div>
                <div class="feature-card">
                    <h4>Active Users</h4>
                    <p id="active-users">128</p>
                </div>
                <div class="feature-card">
                    <h4>Successful Matches</h4>
                    <p id="successful-matches">97</p>
                </div>
            </div>
        </section>
        <br>
        <section class="testimonials">
            <h3>What Our Users Say</h3>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <p>"EsadeMoves made my housing search so easy! I found a great place near campus."</p>
                    <p><b>- Daniel R., Bachelor in Business Administration (Class of 2025)</b></p>
                </div>
                <div class="testimonial-card">
                    <p>"I was really nervous about moving to a new city, but EsadeMoves helped me feel more confident. The listings are legit, and I loved being able to see profiles of other students looking for roommates. I matched with someone from my program, and it's been great!"</p>
                    <p><b>- Christina G., MSc in Marketing Management (Class of 2025)</b></p>
                </div>
                <div class="testimonial-card">
                    <p>"Honestly, EsadeMoves saved me so much time. Instead of scrolling through random Facebook groups or shady rental sites, I found a verified flat and connected with ESADE students directly. It made the whole transition to Barcelona smooth and stress-free."</p>
                    <p><b>- Nicole S., MSc in Innovation & Entrepreneurship (Class of 2024)</b></p>
                </div>
            </div>
        </section>
    </main>

	<footer>
        <div class="container">
            <p> EsadeMoves | Team 5 </p>
			<p> All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 

