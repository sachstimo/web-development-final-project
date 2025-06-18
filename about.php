<?php
session_start();
$logged_in = isset($_SESSION['user_id']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - EsadeMoves</title>
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
	

    <main style="max-width: 900px; margin: 40px auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <section class="about-section">
            <div style="text-align: center;">
                <img src="css/colorlogo.png" alt="EsadeMoves Logo" style="height: 100px;" >
            </div>
            <br>
            <h2 style="color: #002147;">Start your journey with EsadeMoves - your home away from home awaits. </h2>
            <p><br><br>Welcome to <b>EsadeMoves</b>: your trusted community for student housing near ESADE Business School. </p>
            <p>Moving to a new city can be challenging. At EsadeMoves, we turn that challenge into a <b>smoother, more social, and stress-free experience. </b></p>
            <p>Created by ESADE students and alumni, our platform connects you with <b>verified housing options, compatible flatmates, and a network of peers who share your journey in Barcelona. </b></p>            
            <p>Whether you’re starting your first semester, swapping apartments, or just looking to expand your community, EsadeMoves is here to help you <b>feel at home from day one. </b></p>            
            <h3><br><br>Our Mission</h3>
            <p>Our mission is to make moving to Barcelona easier, friendlier, and more connected for the ESADE community. We aim to create a trusted platform where students can find housing, meet future roommates, and grow their social network — all in one place.<br><br></p>
            <h3 style="color: #002147;"><br>What Makes Us Different</h3>
            <ul>
                <li>✅ Exclusive for ESADE students</li>
                <li>🔒 Secure user authentication, safe, and student-friendly listings</li>
                <li>🤝 Community-powered flatmate matching</li>
                <li>📍 Interactive maps and local resources</li>
                <li>💬 Direct chat with owners and other students</li>
                <li>🎉 Local tips & resources</li>
            </ul>
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