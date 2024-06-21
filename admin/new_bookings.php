<?php

include "./admin/include/db_config.php";


$sql = "SELECT id, name, phone, address, date, destination_id FROM bookings";
$result = $con->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date</th>
                <th>Destination ID</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo $row;
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["phone"] . "</td>
                <td>" . $row["address"] . "</td>
                <td>" . $row["date"] . "</td>
                <td>" . $row["destination_id"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close conection
$con->close();

?>;