<?php
    include "../db_connect.php";

    // Sanitize and validate input data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = $_POST['password'];

    // Prepare SQL query using prepared statements
    $sql = "INSERT INTO users_database (name, email, phone_number, user_type, address, password) 
            VALUES (?, ?, ?, ?, ?, ?) 
            ON DUPLICATE KEY UPDATE name=?, email=?, phone_number=?, user_type=?, address=?, password=?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("ssssssssssss", $name, $email, $phonenumber, $category, $address, $password, 
                          $name, $email, $phonenumber, $category, $address, $password);

        // Execute the statement
        if ($stmt->execute()) {
            echo 1; // Success response
        } else {
            echo "Error: " . $stmt->error; // Error response
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error; // Error response if prepare fails
    }

    // Close the database connection
    $conn->close();
?>
