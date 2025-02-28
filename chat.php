<?php
// Database connection
// Database connection settings
$servername = "localhost";
$username = "root";  // Use your MySQL username
$password = "";      // Use your MySQL password
$dbname = "event_management";  // Use your database name

// Start the session to access session variables
session_start();


// Handle POST request (sending a message)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['login_user_id']) && isset($_POST['message'])) {
        // Get the logged-in user ID from the session
        $user_id = $_SESSION['login_user_id'];
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        
        // Get the user's name from the users_database table
        $query = "SELECT name FROM users_database WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            $user_name = $user_data['name'];

            // Insert the message into the chat table
            $insert_query = "INSERT INTO chat (user_id, user_name, message) VALUES ('$user_id', '$user_name', '$message')";
            if (mysqli_query($conn, $insert_query)) {
                echo "Message sent successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "User not found!";
        }
    } else {
        echo "Session not found or message is empty!";
    }
} else {
    // Handle GET request (fetching messages)
    $query = "SELECT * FROM chat ORDER BY timestamp ASC";
    $result = mysqli_query($conn, $query);
    
    $messages = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = [
            'user_name' => $row['user_name'],
            'message' => $row['message'],
            'timestamp' => $row['timestamp']
        ];
    }
    
    // Return messages as JSON
    echo json_encode($messages);
}
?>
