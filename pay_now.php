<?php
require('admin/include/db_config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve POST data and sanitize it
    $name = $con->real_escape_string($_POST['name'] ?? '');
    $phone = $con->real_escape_string($_POST['phone'] ?? '');
    $address = $con->real_escape_string($_POST['address'] ?? '');
    $date = $con->real_escape_string($_POST['date'] ?? ''); // Ensure the date format is correct
    $destination_id = $con->real_escape_string($_POST['destination_id'] ?? '');

    // SQL query to insert data into bookings table
    $sql = "INSERT INTO bookings (name, phone, address, date, destination_id) 
                VALUES ('$name', '$phone', '$address', '$date', '$destination_id')";

    // Execute the query
    if ($con->query($sql) === TRUE) {
        echo "New booking added successfully!";
        
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    echo "Invalid request method.";
}

// Close conection
$con->close();
?>;