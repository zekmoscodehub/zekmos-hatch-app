<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
              <link rel="shortcut icon" href="img/chick.png">

 <meta property="zekmosfarms.org" content="Zekmos hatchapp" /> <!-- website name -->

 <meta property=""   
        content="Zekmos Hatchapp is well crafted API, Built by a well experienced and Developer to take away the tireless effort by individuals, Firms and Institutions in Hatching endevours to bridge the gap of record keeping and creating Reminders to know the state of eggs in the incubators keeping accounts and record is very vital in the hatching business and therefore this app comes to serve this greate purpose." /> <!-- description shown in the actual shared post -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Records</title>
    <!--<link rel="stylesheet" href="styles.css">-->
</head>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

@media screen and (max-width: 600px) {
    table {
        font-size: 12px;
    }
}

</style>
<body>

<div class="container">
    <h2> Hatchery Records</h2>
<?php
// Include the database connection file
include 'connections.php';

// Query to fetch records from the database
$sql = "SELECT * FROM hatchappp";
$result = $conn->query($sql);

// Check if records were found
if ($result->num_rows > 0) {
    // Start building the HTML table
    echo "<table>";
    echo "<tr><th>Date Loaded</th><th>Egg Type</th><th>Source</th><th>Client Mobile</th><th>Details</th><th>Quantity</th><th>Lockdown Date</th><th>Status</th></tr>";

    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["dateLoaded"] . "</td>";
        echo "<td>" . $row["eggType"] . "</td>";
        echo "<td>" . $row["source"] . "</td>";
        echo "<td>" . $row["mobile"] . "</td>";
        echo "<td>" . $row["details"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["lockdownDate"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "</tr>";
    }

    // Close the table
    echo "</table>";
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();
?>
</div>

</body>
</html>