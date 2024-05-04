<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }

        .container {
            max-width: 850px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: auto;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        @media screen and (max-width: 600px) {
            table {
                font-size: 12px;
                max-width: 500px;
                flex-wrap: wrap;
            }
        }

        .delete-btn {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
         .btn:hover {
            background-color: blue;
            color: #fff;
            border: none;
            padding: 6px 7px;
        
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }
            .order{
        background-color:coral;
    }
      .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 10px;
        }
    .logo{
        max-width: 12vmin;
        text-align: center;
        margin: 10px auto;
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
</head>
<body>
    <div class="logo1">
        <a class="link" href="zekmosfarms.org"><img src="img/logo.png" class="logo" /></a>
    </div>
    <a href="hatchapp.php" class="btn"> Home</a>
    <a type="button" href="search.php"class="btn">Find Clients </a>
 
         <a href="order.php" class="btn order" > Make Order</a>
         <a href="view-orders.php" class="btn active"> View Orders</a>
    <div class="container">
        <h1>Order Records</h1>
        <table>
            <thead>
                <tr>
                    <th>Date Ordered</th>
                    <th>Chick Type</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Details</th>
                    <th>Quantity</th>
                    <th>Fee</th>
                    <th>Paid</th>
                    <th>Balance</th>
                    <th>Pickup Date</th>
                    <th>Status</th>
                    <th>Action</th> <!-- New column for delete button -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection file
                include 'connections.php';

                 // Query to fetch records from the database
                $sql = "SELECT * FROM orders_table";
                $result = $conn->query($sql);

                // Check if records were found
                if ($result->num_rows > 0) {
                    // Output data for each row
                   while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["dateordered"] . "</td>";
                        echo "<td>" . $row["chickType"] . "</td>";
                        echo "<td>" . $row["client"] . "</td>";
                        echo "<td>" . $row["mobile"] . "</td>";
                        echo "<td>" . $row["details"] . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "<td>" . $row["fee"] . "</td>";
                        echo "<td>" . $row["paid"] . "</td>";
                        echo "<td>" . $row["balance"] . "</td>";
                        echo "<td>" . $row["pickupDate"] . "</td>";
                       echo "<td>" . $row["status"] . "</td>";
                        echo "<td><button class='delete-btn' onclick='deleteOrder(" . $row["id"] . ")'>Delete</button></td>"; // Delete button
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>No records found</td></tr>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function deleteOrder(id) {
            // Perform AJAX request to delete order with given ID
            if (confirm("Are you sure you want to delete this order?")) {
                // Send AJAX request to delete order
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_order.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Refresh the page after successful deletion
                            location.reload();
                        } else {
                            // Handle error
                            alert("Error deleting order. Please try again later.");
                        }
                    }
                };
                xhr.send("id=" + id);
            }
        }
    </script>
</body>
</html>
