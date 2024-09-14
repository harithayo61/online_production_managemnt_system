<?php
session_start();

// Database connection variables
$servername = "localhost";
$dbname = "production_management";
$dbuser = "root"; // Your DB user
$dbpass = "NewPassword"; // Your DB password

// Create connection
$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute query
$sql = "SELECT id FROM admin_users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // If admin is authenticated
    $_SESSION['admin_username'] = $username; // Set session variable
    header('Location: admin.php'); // Redirect to the admin dashboard
    exit();
} else {
    // Invalid credentials, redirect back to login
    header('Location: adminlogin.php?error=1');
    exit();
}

$stmt->close();
$conn->close();
?>
