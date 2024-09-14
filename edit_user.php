<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header('Location: adminlogin.php');
    exit();
}

$servername = "localhost";
$dbname = "production_management";
$dbuser = "root";  // Your DB credentials
$dbpass = "NewPassword";      // Your DB credentials

$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

// Fetch the user data from the database
$sql = "SELECT username, role FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($username, $role);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Production Management System</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>

    <h2>Edit User</h2>
    <form action="update_user.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>" required>
        </div>
        <div>
            <label for="password">Password (leave blank to keep current password):</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="role">Role:</label>
            <select name="role" id="role">
                <option value="user" <?php if($role === 'user') echo 'selected'; ?>>User</option>
                <option value="admin" <?php if($role === 'admin') echo 'selected'; ?>>Admin</option>
            </select>
        </div>
        <button type="submit">Update User</button>
    </form>

</body>
</html>

<?php
$conn->close();
?>
