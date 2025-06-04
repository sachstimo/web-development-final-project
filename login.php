<?php
session_start();
require_once 'includes/db.php';

// Show error message if it exists
$error = "";
if (isset($_GET['error'])) {
    $error = "Invalid username or password";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Login - EsadeMoves</title>
</head>
<body>
    <form class="form-register" method="POST" action="verify.php">
        <h4>Login to EsadeMoves</h4>
        <?php if($error != "") { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <input class="controls" type="text" name="username" placeholder="Enter your username" required>
        <input class="controls" type="password" name="password" placeholder="Enter your password" required>
        <input class="botons" type="submit" value="Login">
        <p><a href="register.php">Don't have an account? Register here</a></p>
        <p><a href="index.html">Return to Homepage</a></p>
    </form>
</body>
</html> 