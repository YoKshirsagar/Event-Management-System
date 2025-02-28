<?php
// Include database connection
include "../db_connect.php";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $event_name = $_POST['eventname'];
    $event_type = $_POST['eventtype'];
    $event_organizer_id = $_POST['eventorganizerid'];
    $event_client_id = $_POST['eventclientid'];
    $event_date = $_POST['eventdate'];
    $event_ticket_sell_count = $_POST['eventticketsellcount'];
    $event_total_earning = $_POST['eventtotalearning'];
    $event_complete_percentage = $_POST['eventcompletepercentage'];
    // $event_completed = $_POST['eventcompleted'] ;

    // Handle event photos upload
    $event_photos = '';
    if (isset($_FILES['eventphotos']) && $_FILES['eventphotos']['error'][0] == 0) {
        $upload_dir = '../uploads/';
        $uploaded_files = [];
        foreach ($_FILES['eventphotos']['name'] as $key => $filename) {
            $target_file = $upload_dir . basename($filename);
            if (move_uploaded_file($_FILES['eventphotos']['tmp_name'][$key], $target_file)) {
                $uploaded_files[] = $target_file;
            }
        }
        $event_photos = implode(',', $uploaded_files); // Store file paths as a comma-separated string
    }

    // Insert the event data into the database
    $insertQuery = "INSERT INTO event_database (event_name, event_type, event_organizer_id, event_client_id, event_photos, event_date, event_ticket_sell_count, event_total_earning, complete_percent) 
                    VALUES ('$event_name', '$event_type', '$event_organizer_id', '$event_client_id', '$event_photos', '$event_date', '$event_ticket_sell_count', '$event_total_earning', '$event_complete_percentage')";

    if (mysqli_query($conn, $insertQuery)) {
        echo 1; // Success
    } else {
        echo "Error: " . mysqli_error($conn); // Error message
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
mysqli_close($conn);
?>
