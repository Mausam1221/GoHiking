<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Retrieve POST data and sanitize it
    $name = $conn->real_escape_string($_POST['name'] ?? '');
    $phone = $conn->real_escape_string($_POST['phone'] ?? '');
    $address = $conn->real_escape_string($_POST['address'] ?? '');
    $date = $conn->real_escape_string($_POST['date'] ?? ''); // Ensure the date format is correct
    $destination_id = $conn->real_escape_string($_POST['destination_id'] ?? '');

    // SQL query to insert data into bookings table
    $sql = "INSERT INTO bookings (name, phone, address, date, destination_id) 
            VALUES ('$name', '$phone', '$address', '$date', '$destination_id')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New booking added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request method.";
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>paid</h2>
</body>
</html>