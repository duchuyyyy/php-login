<?php
session_start();
// Check if the user is not logged in (session variable not set)
if (isset($_SESSION['user_id'])) {
    // Redirect to login page
    header('Location: /views/homepage.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../views/css/login.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="../controllers/AuthController.php">
            <div class="form-group">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</body>

</html>