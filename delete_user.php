<?php
session_start();
include 'db_connect.php';

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['id'];
    
    // Security check: Only Admins can delete users
    if ($_SESSION['login_user_type'] != 1) {
        echo 0; // Not authorized
        exit;
    }

    // Prevent Admin from deleting themselves
    if ($user_id == $_SESSION['login_user_id']) {
        echo 0; // Cannot delete self
        exit;
    }

    // Delete query with prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM users_database WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        echo 1; // Success
    } else {
        echo 0; // Error or user not found
    }
    $stmt->close();
    $conn->close();
} else {
    echo 0; // Invalid request
}
?>
