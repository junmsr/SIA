<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css"></link>
</head>
<body>
    <div class="form-container" id="login-form">
        <h2>Login</h2>
        <form>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <input type="submit" value="Login">
        </form>
        <p class="toggle-link">Don't have an account? <a href="#" onclick="toggleForms()">Sign Up</a></p>
    </div>

    <div class="form-container" id="signup-form" style="display: none;">
        <h2>Sign Up</h2>
        <form>
            <label for="signup-name">Name:</label>
            <input type="text" id="signup-name" name="name" placeholder="Enter your name" required>

            <label for="signup-email">Email:</label>
            <input type="email" id="signup-email" name="email" placeholder="Enter your email" required>

            <label for="signup-password">Password:</label>
            <input type="password" id="signup-password" name="password" placeholder="Create a password" required>

            <input type="submit" value="Sign Up">
        </form>
        <p class="toggle-link">Already have an account? <a href="#" onclick="toggleForms()">Login</a></p>
    </div>

    <script>
        function toggleForms() {
            const loginForm = document.getElementById('login-form');
            const signupForm = document.getElementById('signup-form');

            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                signupForm.style.display = 'none';
            } else {
                loginForm.style.display = 'none';
                signupForm.style.display = 'block';
            }
        }
    </script>
</body>
</html>
