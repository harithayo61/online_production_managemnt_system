<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Production Management System</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>

<div class="header">
    <div class="header-left">
        <h1>Production Management System of Institute of Colombo</h1>
    </div>
    <div class="header-right">
        <img src="logo.png" alt="Institute Logo" class="logo">
    </div>
</div>

<nav>
    <button class="nav-button" data-page="home">Home</button>
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
    <button class="nav-button" data-page="admin">Admin</button>
    <button class="nav-button" data-page="help">Help</button>
</nav>

<div class="functionalities">
    <div class="functionality">
        <a href="course_materials.php">
            <img src="course_materials.jpg" alt="Course Materials">
            <p>Course Materials Creation</p>
        </a>
    </div>
    <div class="functionality">
        <a href="research_projects.php">
            <img src="research_projects.jpg" alt="Research Projects">
            <p>Research Project Management</p>
        </a>
    </div>
    <div class="functionality">
        <a href="event_planning.php">
            <img src="event_planning.jpg" alt="Event Planning">
            <p>Event Planning</p>
        </a>
    </div>
    <div class="functionality">
        <a href="media_content.php">
            <img src="media_content.jpg" alt="Media Content">
            <p>Media Content Creation</p>
        </a>
    </div>
    <div class="functionality">
        <a href="lab_experiments.php">
            <img src="lab_experiments.jpg" alt="Lab Experiments">
            <p>Lab Experiment Management</p>
        </a>
    </div>
    <div class="functionality">
        <a href="admin_processes.php">
            <img src="admin_processes.jpg" alt="Administrative Processes">
            <p>Administrative Processes</p>
        </a>
    </div>
</div>

<!-- Display user info -->
<div class="user-info">
    <img src="<?php echo $_SESSION['profile_photo']; ?>" alt="Profile Photo" class="profile-photo">
    <p>You are logged in as <?php echo $_SESSION['username']; ?> (<?php echo $_SESSION['role']; ?>)</p>
</div>

</body>
</html>
