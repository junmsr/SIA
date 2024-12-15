<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $file = 'users.txt';

    if ($action === 'signup') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user = "$name,$email,$password\n";
        file_put_contents($file, $user, FILE_APPEND);
        $_SESSION['user'] = $name;
        header('Location: dash.php');
        exit;
    } elseif ($action === 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (file_exists($file)) {
            $users = file($file, FILE_IGNORE_NEW_LINES);
            foreach ($users as $user) {
                list($name, $storedEmail, $storedPassword) = explode(',', $user);
                if ($email === $storedEmail && password_verify($password, $storedPassword)) {
                    $_SESSION['user'] = $name;
                    header('Location: dash.php');
                    exit;
                }
            }
        }
        echo "<script>alert('Invalid email or password');</script>";
    }
}
?>
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
        <form method="POST">
            <input type="hidden" name="action" value="login">
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
        <form method="POST">
            <input type="hidden" name="action" value="signup">
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
            loginForm.style.display = loginForm.style.display === 'none' ? 'block' : 'none';
            signupForm.style.display = signupForm.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>
