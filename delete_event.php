<?php
session_start();
include 'db_connect.php';

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['id'];
    
    // Security check: Only Admins or the Event Organizer can delete events
    if ($_SESSION['login_user_type'] != 1 && $_SESSION['login_user_type'] != 2) {
        echo 0; // Not authorized
        exit;
    }

    // Check if the event belongs to the organizer (if the user is an organizer)
    if ($_SESSION['login_user_type'] == 2) {
        $qry = $conn->query("SELECT * FROM event_database WHERE event_id = $event_id AND event_organizer_id = ".$_SESSION['login_user_id']);
        if ($qry->num_rows == 0) {
            echo 0; // Event not found or not authorized
            exit;
        }
    }

    // Delete query with prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM event_database WHERE event_id = ?");
    $stmt->bind_param("i", $event_id);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        echo 1; // Success
    } else {
        echo 0; // Error or event not found
    }
    $stmt->close();
    $conn->close();
} else {
    echo 0; // Invalid request
}
?>
