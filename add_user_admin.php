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

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password hashing
$role = $_POST['role'];

// Insert into users or admins table based on role
if ($role === 'admin') {
    $sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
} else {
    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
}

$stmt = $conn->prepare($sql);
if ($role === 'admin') {
    $stmt->bind_param("ss", $username, $password);
} else {
    $stmt->bind_param("sss", $username, $password, $role);
}
$stmt->execute();

header('Location: admin.php');
$conn->close();
?>
