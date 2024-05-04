<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
              <link rel="shortcut icon" href="img/chick.png">

 <meta property="zekmosfarms.org" content="Zekmos hatchapp" /> <!-- website name -->

 <meta property=""   
        content="Zekmos Hatchapp is well crafted API, Built by a well experienced and Developer to take away the tireless effort by individuals, Firms and Institutions in Hatching endevours to bridge the gap of record keeping and creating Reminders to know the state of eggs in the incubators keeping accounts and record is very vital in the hatching business and therefore this app comes to serve this greate purpose." /> <!-- description shown in the actual shared post -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Search</title>
    </head>
     <style>
    /* Reset default margin, padding, and box-sizing */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
    display: flex;
    margin: 10px 50px;
    text-align: center;
}

/* Container styles */
.container {
    max-width: 1200px;
    margin: 0 auto;
     display: block;
    
}

/* Heading styles */
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Search form styles */
.search-form {
    margin-bottom: 20px;
}

.search-form form {
    display: flex;
    align-items: center;
    justify-content: center;
}

.search-form label {
    margin-right: 10px;
}

.search-form select,
.search-form input[type="text"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 10px;
}

.btn, .search-form button[type="submit"] {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin: 15px;
}


.btn, .search-form button[type="submit"]:hover {
    background-color: #45a049;
}

/* Hatching records table styles */
.hatching-records {
    background-color: #fff;
    border-radius: 8px;
    overflow-x: auto;
}

.hatching-records table {
    width: 100%;
    border-collapse: collapse;
}

.hatching-records th,
.hatching-records td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

.hatching-records th {
    background-color: #f2f2f2;
}

.hatching-records tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Status background colors */
/*blue -incubating*/
        .blue-background {
            background-color: #3498db;
            color: white;
        }
        /*yellow - nearing*/
        .yellow-background {
            background-color: #ffff9f;
            color: black;
        }
        /*red -lockdown*/
        .red-background {
            background-color: #e74c3c;
            color: white;
        }
        /*pink - invalid*/
        .pink-background {
            background-color: #ff80ff;
            color: white;
        }
        /*gray - delayed*/
        .gray-background {
            background-color: #c4bebb;
            color: white;
        }
        /*lightGreen - progressing*/
        .lightGreen-background {
            background-color: #cfffc1;
            color: white;
        }
        /*green- hatched*/
             .green-background {
            background-color: #008040;
            color: white;
        }
        /*forest -hatching*/
        .forest-background {
            background-color: #80ff00;
            color: white;
        }
/* Delete button styles */
.delete-button {
    background-color: #e74c3c;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 8px 16px;
    cursor: pointer;
}

.delete-button:hover {
    background-color: #c0392b;
}
a{
    text-decoration: none;
   
}
       .order{
        background-color:coral;
         margin-bottom: 20px;
    }
     .logo{
        max-width: 12vmin;
        text-align: center;
        margin: 20px auto;
        border-radius: 50%;
        border:1px solid coral;
        cursor: pointer;
    }
    .logo:hover{
        border: 1px solid blue;
        
    }
       .active{
        background:gray;
        color:#fff;
    }
 </style>
 <body
     
   <div class="search-form container">
       <div class="logo1">
        <a class="link" href="zekmosfarms.org"><img src="img/logo.png" class="logo" /></a>
    </div>
       <div style="margin:20px;">     
 <a href="hatchapp.php" class="btn"> Home</a>
        <a href="search.php" class="btn active"> Find Client</a>
        <a href="order.php" class="btn order"> Make Order</a>
        <a href="view-orders.php" class="btn"> View Orders</a></div>
       <div>  <h2>Hatchery Records</h2></div><br>
        <form method="get">
            
            <label for="searchCriteria">Search By:</label>
            <select id="searchCriteria" name="searchCriteria">
                <option value="source">Source</option>
                <option value="mobile">Mobile Number</option>
            </select>
            <label for="searchTerm">Search Term:</label>
            <input type="text" id="searchTerm" name="searchTerm">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="hatching-records">
        <?php
        // Include the database connection file
        include 'connections.php';

        // Check if delete button is clicked
        if (isset($_POST['delete_id'])) {
            $delete_id = $_POST['delete_id'];

            // Query to delete the record
            $sql_delete = "DELETE FROM hatchappp WHERE id = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("i", $delete_id);
            $stmt_delete->execute();

            // Check if deletion was successful
            if ($stmt_delete->affected_rows > 0) {
                echo "<p>Record deleted successfully.</p>";
            } else {
                echo "<p>Error deleting record.</p>";
            }
        }

        // Check if search form is submitted
        if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm']) && isset($_GET['searchCriteria'])) {
            $searchTerm = $_GET['searchTerm'];
            $searchCriteria = $_GET['searchCriteria'];

            // Validate and sanitize input to prevent SQL injection
            $searchTerm = mysqli_real_escape_string($conn, $_GET['searchTerm']);

            // Query to fetch records based on search criteria
            $sql = "SELECT * FROM hatchappp WHERE $searchCriteria = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $searchTerm);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if records were found
    if ($result->num_rows > 0) {
        // Start building the HTML table
        echo "<table>";
        echo "<tr><th>Date Loaded</th><th>Egg Type</th><th>Client Name</th><th>Mobile</th><th>Details</th><th>Quantity</th><th>Fees</th><th>Amount paid</th><th>Balance</th><th>Lockdown Date</th><th>Status</th><th>Total Qty</th><th>Action</th></tr>";

       $totalQuantity = 0; // Initialize total quantit12
        $totalFee = 0;
        $totalPaid = 0;
        $totalBalance = 0;
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["dateLoaded"] . "</td>";
            echo "<td>" . $row["eggType"] . "</td>";
            echo "<td>" . $row["source"] . "</td>";
            echo "<td>" . $row["mobile"] . "</td>";
            echo "<td>" . $row["details"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td>" . $row["fee"] . "</td>";
            echo "<td>" . $row["paid"] . "</td>";
            echo "<td>" . $row["balance"] . "</td>";
            echo "<td>" . $row["lockdownDate"] . "</td>";

            // Add class based on status
            $statusClass = "";
            switch ($row["status"]) {
                case "No Eggs loaded":
                    $statusClass = "blue-background";
                    break;
                case "Loaded in Incubator":
                    $statusClass = "yellow-background";
                    break;
                case "Progressing to lockdown":
                case "In lockdown":
                case "Hatched":
                    $statusClass = "red-background";
                    break;
                default:
                    $statusClass = "";
                    break;
            }

            echo "<td class='$statusClass'>" . $row["status"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            // Add delete button with confirmation
            echo "<td>";
            echo "<form method='post' onsubmit='return confirmDelete()'>";
            echo "<input type='hidden' name='delete_id' value='" . $row["id"] . "'>";
            echo "<button type='submit'>Delete</button>";
            echo "</form>";
            echo "</td>";

            echo "</tr>";

          // Add quantity to total
             $totalFee += intval($row["fee"]);
              $totalPaid += intval($row["paid"]);
               $totalBalance += intval($row["balance"]);
            $totalQuantity += intval($row["quantity"]);
        }

        // Display total row
       echo "<tr><td colspan='10'></td><td><strong>Total Qty:</strong></td><td><strong>$totalQuantity</strong></td><td></td></tr><tr><td colspan='10'></td><td><strong>Total Fees:</strong></td><td><strong>$totalFee</strong></td><td></td></tr><tr><td colspan='10'></td><td><strong>Total paid:</strong></td><td><strong>$totalPaid</strong></td><td></td></tr><tr><td colspan='10'></td><td><strong>Total Balance:</strong></td><td><strong>$totalBalance</strong></td><td></td></tr>";

        // Close the table
        echo "</table>";
            } else {
                echo "No records found for '$searchTerm'";
            }
        } else {
            // Query to fetch all records
            $sql = "SELECT * FROM hatchappp";
            $result = $conn->query($sql);

            // Check if records were found
            if ($result->num_rows > 0) {
                // Start building the HTML table (same as before)
                echo "<table>";
                // Output data for each row (same as before)
                // ...
            } else {
                echo "No records found";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Delete this entry?");
        }
    </script>

</body>
</html>