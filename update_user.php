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

$id = $_POST['id'];
$username = $_POST['username'];
$role = $_POST['role'];
$password = $_POST['password'];

// If the password field is not empty, update the password, otherwise keep the current password
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET username = ?, password = ?, role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $hashed_password, $role, $id);
} else {
    $sql = "UPDATE users SET username = ?, role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $role, $id);
}

$stmt->execute();
header('Location: admin.php');
$conn->close();
?>
