<?php
// Include the database connection file
include 'connections.php';

// Initialize an empty array to store fetched records
$records = [];

// Attempt to fetch records from the database
$sql = "SELECT * FROM hatchapp";
$result = $conn->query($sql);

// If records are found, fetch them and store in the array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
}

// Close the database connection
$conn->close();

// Send the records as JSON response
header('Content-Type: application/json');
echo json_encode($records);
?>
