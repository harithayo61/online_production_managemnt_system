<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header('Location: adminlogin.php');
    exit();
}

$admin_username = $_SESSION['admin_username'];

// Connect to the database
$servername = "localhost";
$dbname = "production_management";
$dbuser = "root";  // Update with your DB credentials
$dbpass = "NewPassword";      // Update with your DB credentials

$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users
$users_sql = "SELECT id, username, role FROM users";
$users_result = $conn->query($users_sql);

// Fetch all admins
$admins_sql = "SELECT id, username FROM admin_users"; // assuming `admins` table exists for admin info
$admins_result = $conn->query($admins_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Production Management System</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <!-- Top Section -->
    <header>
        <div class="header-container">
            <div class="header-title">Admin Dashboard - Production Management System</div>
            <div class="header-logo">
                <img src="logo2.png" alt="Logo" class="logo-image">
            </div>
        </div>
    </header>

    <!-- Navigation Tabs -->
    <nav class="navbar">
        <button class="nav-button" onclick="location.href='home.php'">Home</button>
        <button class="nav-button" onclick="location.href='adminlogin.php'">Admin</button>
        <button class="nav-button" onclick="navigateTo('help')">Help</button>
    </nav>

    <!-- Admin Profile Section -->
    <div class="user-profile">
        <img src="profile_pics/admin_profile.png" alt="Admin Profile Picture" class="profile-image">
        <span class="user-info">You are logged in as an admin (<?php echo htmlspecialchars($admin_username); ?>)</span>
        <button class="logout-button" onclick="location.href='logout.php';">Logout</button>
    </div>

    <!-- Main Content -->
    <main>
        <section class="content">
            <h2>Welcome to the Admin Dashboard</h2>
            <p>Manage users and admins below.</p>

            <!-- Display Users Table -->
            <h3>Manage Users</h3>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = $users_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['role']); ?></td>
                            <td>
                                <button onclick="location.href='edit_user.php?id=<?php echo $user['id']; ?>'">Edit</button>
                                <button onclick="location.href='delete.php?id=<?php echo $user['id']; ?>&type=user'">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Display Admins Table -->
            <h3>Manage Admins</h3>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($admin = $admins_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($admin['username']); ?></td>
                            <td>
                                <button onclick="location.href='edit_admin.php?id=<?php echo $admin['id']; ?>'">Edit</button>
                                <button onclick="location.href='delete.php?id=<?php echo $admin['id']; ?>&type=admin'">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Add New User/Admin Section -->
            <h3>Add New User/Admin</h3>
            <form action="add_user_admin.php" method="POST">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div>
                    <label for="role">Role:</label>
                    <select name="role" id="role">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit">Add User/Admin</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>

<?php
$conn->close();
?>
