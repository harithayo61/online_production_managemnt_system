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

// Get the ID and type (user or admin) from the URL
$id = $_GET['id'];
$type = $_GET['type'];

if ($type === 'user') {
    // Delete from users table
    $sql = "DELETE FROM users WHERE id = ?";
} elseif ($type === 'admin') {
    // Delete from admins table
    $sql = "DELETE FROM admin_users WHERE id = ?";
} else {
    // Invalid type
    header('Location: admin.php?error=invalid_type');
    exit();
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Redirect back to the admin page after deletion
header('Location: admin.php');
$conn->close();
?>
