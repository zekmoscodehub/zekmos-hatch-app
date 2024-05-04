<?php

// Database connection parameters
$hostname = "localhost";
$username = "root";
$password = ""; // Enter your database password here
$database = "hatchap_db";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    $connection_status = "Connection failed: " . $conn->connect_error;
   
} 
//else {
//  $connection_status = "Connected successfully";
//}

//echo "Database Connection Status: " . $connection_status;
