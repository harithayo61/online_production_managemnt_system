<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
$profile_photo = $_SESSION['profile_photo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Management System of Institute of Colombo</title>
    <link rel="stylesheet" href="help.css">
    <script>
        function navigateTo(page) {
            window.location.href = page + '.php';
        }

        function redirectToHome() {
            window.location.href = 'home.php';
        }
    </script>
</head>
<body>
    <!-- Top Section -->
    <header>
        <div class="header-container">
            <div class="header-title" onclick="redirectToHome()">Production Management System of Institute of Colombo</div>
            <div class="header-logo">
                <img src="logo2.png" alt="Logo" class="logo-image">
            </div>
        </div>
    </header>

    <!-- Navigation Tabs -->
    <nav class="navbar">
        <button class="nav-button" onclick="redirectToHome()">Home</button>
        <div class="dropdown">
            <button class="nav-button">Functionalities</button>
            <div class="dropdown-content">
                <a href="course_materials.php">Course Materials Creation</a>
                <a href="research_projects.php">Research Project Management</a>
                <a href="event_planning.php">Event Planning</a>
                <a href="media_content.php">Media Content Creation</a>
                <a href="lab_experiments.php">Lab Experiment Management</a>
                <a href="adminlogin.php">Administrative Processes</a>
            </div>
        </div>
        <button class="nav-button" onclick="location.href='adminlogin.php'">Admin</button>
        <button class="nav-button" onclick="navigateTo('help')">Help</button>
    </nav>

    <!-- User Profile Section -->
    <div class="user-profile">
        <img src="profile_pics/<?php echo htmlspecialchars($profile_photo); ?>" alt="Profile Picture" class="profile-image">
        <span class="user-info">You are logged in as <?php echo htmlspecialchars($role); ?></span>
        <button class="logout-button" onclick="location.href='login.php';">Logout</button>
    </div>

<main>
    <section class="help-section">
        <h2>Contact Us</h2>
        <p>If you need any assistance, feel free to reach out to us via email:</p>
        <form class="email-form" action="submit_email.php" method="post">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            
            <button type="submit" class="submit-button">Send Message</button>
        </form>
    </section>
</main>