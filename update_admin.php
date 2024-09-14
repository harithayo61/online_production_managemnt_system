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

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

// If the password field is not empty, update the password, otherwise keep the current password
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE admins SET username = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $hashed_password, $id);
} else {
    $sql = "UPDATE admins SET username = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $username, $id);
}

$stmt->execute();
header('Location: admin.php');
$conn->close();
?>
