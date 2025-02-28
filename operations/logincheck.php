<?php
    include "../db_connect.php";
    session_start();

    $data = stripslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);
    
    $email = $mydata['email'];
    $password = $mydata['password'];

    $sql = "SELECT * FROM users_database WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        foreach ($result->fetch_array() as $key => $value) {
            if ($key != 'user_password' && !is_numeric($key))
                $_SESSION['login_' . $key] = $value;
        }
        echo 1; // Use echo instead of return
    } else {
        echo 2; // Use echo instead of return
    }
    
?>