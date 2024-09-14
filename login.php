<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Production Management System</title>
    <link rel="stylesheet" href="login.css">
    <script src="script.js" defer></script>
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <img src="logo.png" alt="Institute Logo" class="logo">
        <h3>Production Management System of Institute of Colombo</h3>
        <h4>Login</h4>

        <?php if (isset($_GET['error'])): ?>
            <p class="error">Invalid login information</p>
        <?php endif; ?>

        <form action="authenticate.php" method="POST" id="loginForm">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <button type="submit" id="loginButton">Login</button>
        </form>
    </div>
</div>

</body>
</html>
