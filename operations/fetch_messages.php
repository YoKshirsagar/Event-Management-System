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

// Check if user is logged in
if (!isset($_SESSION['login_user_id'])) {
    die('You are not logged in');
}

$user_id = $_SESSION['login_user_id'];

// Fetch messages from the database
$query = "SELECT c.chat_id, c.message, c.timestamp, c.user_id, u.name 
          FROM chat c 
          JOIN users_database u ON c.user_id = u.user_id 
          WHERE c.user_id = ? OR c.user_id IN (SELECT user_id FROM users_database WHERE user_id != ?) 
          ORDER BY c.timestamp ASC";

$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $user_id, $user_id); // Fetch messages involving the logged-in user and any other user
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    // Check if the message is sent by the logged-in user
    if ($row['user_id'] == $user_id) {
        echo "<div class='message sent'>";
    } else {
        echo "<div class='message received'>";
    }
    echo "<strong>" . htmlspecialchars($row['name']) . ":</strong><br>" . htmlspecialchars($row['message']);
    echo "<br><small><span class='timestamp'>" . $row['timestamp'] . "</span></small>";
    echo "</div>";
}

$stmt->close();
$conn->close();
?>
