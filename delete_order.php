<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


// Include the database connection file
include 'connections.php';

// Check if ID parameter is set
if (isset($_POST['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Prepare SQL statement to delete order with the given ID
    $sql = "DELETE FROM orders_table WHERE id = '$id'";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        // Order deleted successfully
        echo "Order deleted successfully";
    } else {
        // Error deleting order
        echo "Error: " . $conn->error;
    }
} else {
    // ID parameter is not set
    echo "ID parameter is not set";
}

// Close the database connection
$conn->close();

