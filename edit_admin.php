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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

// Fetch the admin data from the database
$sql = "SELECT username FROM admin_users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin - Production Management System</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>

    <h2>Edit Admin</h2>
    <form action="update_admin.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>" required>
        </div>
        <div>
            <label for="password">Password (leave blank to keep current password):</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Update Admin</button>
    </form>

</body>
</html>

<?php
$conn->close();
?>
