<?php
session_start();
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "event_management"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Include your database connection

// Check if user is logged in
if (!isset($_SESSION['login_user_id'])) {
    die('You are not logged in');
}

$user_id = $_SESSION['login_user_id'];
$message = $_POST['message'];

// Insert message into the database
$query = "INSERT INTO chat (user_id, message) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("is", $user_id, $message);
$stmt->execute();

echo "Message sent!";
?>
