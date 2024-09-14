<?php
// Database connection
$host = 'localhost'; // Database host
$db = 'production_management'; // Database name
$user = 'root'; // Database username
$pass = ''; // Database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];
    $action = $_POST['action'];

    if ($action == 'accept') {
        // Redirect to Gmail with the recipient's email
        $sql = "SELECT email FROM lab_experiment_requests WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row['email'];

            // Mark as accepted
            $sql_update = "UPDATE lab_experiment_requests SET status = 'accepted' WHERE id = $id";
            if ($conn->query($sql_update) === TRUE) {
                header("Location: https://mail.google.com/mail/?view=cm&fs=1&to=$email&su=Request%20Accepted&body=Your%20request%20has%20been%20accepted.");
                exit();
            }
        }
    } elseif ($action == 'delete') {
        // Delete the request
        $sql = "DELETE FROM lab_experiment_requests WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            header('Location: admin.php');
            exit();
        }
    }
}

$conn->close();
?>
