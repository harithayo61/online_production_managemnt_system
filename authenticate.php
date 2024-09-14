<?php
session_start();

$servername = "localhost";
$dbname = "production_management";
$dbuser = "root"; // Use your database username
$dbpass = "NewPassword"; // Use your database password

// Create connection
$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute query
$sql = "SELECT role, profile_photo FROM users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($role, $profile_photo);
$stmt->fetch();
$stmt->close();
$conn->close();

if ($role) {
    // Successful login
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    $_SESSION['profile_photo'] = $profile_photo;
    header('Location: home.php');
    exit();
} else {
    // Invalid credentials
    header('Location: login.php?error=1');
    exit();
}
?>
