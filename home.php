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
    <link rel="stylesheet" href="home.css">
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
<!-- Main Content -->
<main>
    <section class="content">
        <!-- Functional Section: Course Materials Creation -->
        <div class="functional-section">
            <a href="course_materials.php">
                <img src="images/course_materials.jpg" alt="Course Materials Creation">
                <h2>Course Materials Creation</h2>
            </a>
            <p>Organizing the development and publishing of course materials, lecture notes, assignments, and exam papers by faculty members.</p>
        </div>

        <!-- Functional Section: Research Project Management -->
        <div class="functional-section">
            <a href="research_projects.php">
                <img src="images/research_projects.jpg" alt="Research Project Management">
                <h2>Research Project Management</h2>
            </a>
            <p>Handling the production stages of research projects, including planning, task assignments, progress tracking, and the final submission of research outputs.</p>
        </div>

        <!-- Functional Section: Event Planning -->
        <div class="functional-section">
            <a href="event_planning.php">
                <img src="images/event_planning.jpg" alt="Event Planning">
                <h2>Event Planning</h2>
            </a>
            <p>Managing the production process for university events, such as conferences, workshops, or seminars, from organizing tasks to monitoring timelines and budgets.</p>
        </div>

        <!-- Functional Section: Media Content Creation -->
        <div class="functional-section">
            <a href="media_content.php">
                <img src="images/media_content.jpg" alt="Media Content Creation">
                <h2>Media Content Creation</h2>
            </a>
            <p>Overseeing the production of media-related content, such as videos, graphics, and presentations, for academic or promotional purposes.</p>
        </div>

        <!-- Functional Section: Lab Experiment Management -->
        <div class="functional-section">
            <a href="lab_experiments.php">
                <img src="images/lab_experiments.jpg" alt="Lab Experiment Management">
                <h2>Lab Experiment Management</h2>
            </a>
            <p>Organizing experiments in university laboratories, tracking resources, equipment usage, and timelines for research purposes.</p>
        </div>

        <!-- Functional Section: Administrative Processes -->
        <div class="functional-section">
            <a href="adminlogin.php">
                <img src="images/admin_processes.jpg" alt="Administrative Processes">
                <h2>Administrative Processes</h2>
            </a>
            <p>Tracking administrative tasks like admissions, registration, student services, and staff hiring processes.</p>
        </div>
    </section>
</main>



    <!-- Footer -->
    <footer>
        <p>&copy; 2024 All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
    
</body>
</html>
