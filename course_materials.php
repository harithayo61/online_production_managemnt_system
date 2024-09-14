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
    <link rel="stylesheet" href="cource.css">
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
                <a href="admin_processes.php">Administrative Processes</a>
            </div>
        </div>
        <button class="nav-button" onclick="navigateTo('admin')">Admin</button>
        <button class="nav-button" onclick="navigateTo('help')">Help</button>
    </nav>

    <!-- User Profile Section -->
    <div class="user-profile">
        <img src="profile_pics/<?php echo htmlspecialchars($profile_photo); ?>" alt="Profile Picture" class="profile-image">
        <span class="user-info">You are logged in as <?php echo htmlspecialchars($role); ?></span>
        <button class="logout-button" onclick="location.href='login.php';">Logout</button>
    </div>

<div class="form-container">
    <h2>Request Access to Course Materials Creation</h2>
    <form action="submit_request.php" method="POST">
        <input type="hidden" name="service" value="course_materials">
        <div class="input-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="reason">Reason for Access</label>
            <textarea id="reason" name="reason" required></textarea>
        </div>
        <button type="submit">Submit Request</button>
    </form>
</div>
 <!-- Footer -->
 <footer>
        <p>&copy; 2024 All rights reserved.</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
