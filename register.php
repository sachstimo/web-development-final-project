<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - EsadeMoves</title>
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
                <li><a href="about.html">About</a></li>
                <li><a href="listings.php">Housing</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <section class="auth-section">
            <h2>Create an Account</h2>
            
            <?php
            session_start();
            if (isset($_SESSION['register_errors'])) {
                echo '<div class="error-messages">';
                foreach ($_SESSION['register_errors'] as $error) {
                    echo '<p class="error">' . htmlspecialchars($error) . '</p>';
                }
                echo '</div>';
                unset($_SESSION['register_errors']);
            }
            ?>
            
            <form class="auth-form" action="process_register.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>
                
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                
                <div class="form-group">
                    <label for="user_type">I am a:</label>
                    <select id="user_type" name="user_type" required>
                        <option value="student">Student</option>
                        <option value="landlord">Landlord</option>
                    </select>
                </div>
                
                <div class="form-group student-fields" style="display: none;">
                    <label for="program">ESADE Program:</label>
                    <select id="program" name="program">
                        <option value="">Select Program</option>
                        <option value="bachelor">Bachelor</option>
                        <option value="master">Master</option>
                        <option value="mba">MBA</option>
                        <option value="executive">Executive Education</option>
                    </select>
                </div>
                
                <div class="form-group student-fields" style="display: none;">
                    <label>
                        <input type="checkbox" name="looking_for_roommate" value="1">
                        I am looking for a roommate
                    </label>
                </div>
                
                <button type="submit" class="btn">Register</button>
            </form>
            
            <p class="form-footer">
                Already have an account? <a href="login.php">Login here</a>
            </p>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <script>document.write(new Date().getFullYear())</script> EsadeMoves. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Show/hide student fields based on user type
        const userTypeSelect = document.getElementById('user_type');
        const studentFields = document.querySelectorAll('.student-fields');
        
        function toggleStudentFields() {
            const isStudent = userTypeSelect.value === 'student';
            studentFields.forEach(field => {
                if (isStudent) {
                    field.style.display = 'block';
                    field.classList.remove('hidden');
                } else {
                    field.style.display = 'none';
                    field.classList.add('hidden');
                }
            });
        }

        // Initial toggle on page load
        toggleStudentFields();
        
        // Toggle on change
        userTypeSelect.addEventListener('change', toggleStudentFields);
    </script>
</body>
</html> 