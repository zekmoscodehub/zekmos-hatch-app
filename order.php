<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
// Connect to database
require_once('connections.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $dateOrdered = $_POST['dateordered'];
    $chickType = $_POST['chickType'];
    $client = $_POST['client'];
    $mobile = $_POST['mobile'];
    $details = $_POST['details'];
    $quantity = $_POST['quantity'];
    $fee = $_POST['fee'];
    $paid = $_POST['paid'];

    // Calculate balance
    $balance = $fee - $paid;

    // Calculate pickup date (30 days after paid)
    $pickupDate = date('Y-m-d', strtotime($dateOrdered . ' + 30 days'));

    // Calculate status
    $status = (strtotime($dateOrdered) + (30 * 24 * 60 * 60) < time()) ? 'delivered' : 'ordered';

    // Insert data into orders_table
    $query = "INSERT INTO orders_table (dateordered, chicktype, client, mobile, details, quantity, fee, paid, balance, pickupdate, status)
              VALUES ('$dateOrdered', '$chickType', '$client', '$mobile', '$details', '$quantity', '$fee', '$paid', '$balance', '$pickupDate', '$status')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Database query failed.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

     <meta charset="UTF-8">
              <link rel="shortcut icon" href="img/chick.png">

 <meta property="zekmosfarms.org" content="Zekmos hatchapp" /> <!-- website name -->

 <meta property=""   
        content="Zekmos Hatchapp is well crafted API, Built by a well experienced and Developer to take away the tireless effort by individuals, Firms and Institutions in Hatching endevours to bridge the gap of record keeping and creating Reminders to know the state of eggs in the incubators keeping accounts and record is very vital in the hatching business and therefore this app comes to serve this greate purpose." /> <!-- description shown in the actual shared post -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    display: block;

}

.container {
    max-width:  1200px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 20px;
}

form {
    display: grid;
    gap: 10px;
}

form label {
    font-weight: bold;
  margin-left:140px;
        
}

form input[type="text"],
orm input[type="select"],
form input[type="date"],
form select {
    width: 95vmin;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
     background-color: #f4f4f4;
     margin: 2px auto;
}
form input[type="text"]:hover,
orm input[type="select"]:hover,
form input[type="date"]:hover,
form select:hover {
    
     background-color: #f4f4f4;
}

form input[type="submit"] {
    width: 95vmin;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
    margin-left:140px;
}
.btn{
    width: 95vmin;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
  
}

form input[type="submit"]:hover {
    background-color: #45a049;
}
.btn{
    
    text-decoration: none;
}
@media screen and (max-width: 400px) {
    .container {
        margin: 10px;
        padding: 10px;
        font-size: 3vmin;
    }

    form {
        grid-template-columns: 1fr;
    }
}
    .order{
        background-color:coral;
    }
    .active{
        background:gray;
        color:#fff;
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
    .btn-area{
        margin:20px;
        text-align: center;
    }
    h2{
        color:blue;
        margin: 25px;
    }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 870px;
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
           width: 80%;
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
        .delete-btn {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #c0392b;
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
         <div class="logo1"style="text-align: center;">
        <a class="link" href="zekmosfarms.org"><img src="img/logo.png" class="logo" /></a>
    </div>
        <div class="btn-area">
 <a href="hatchapp.php" class="btn"> Home</a>
        <a href="search.php" class="btn"> Find Client</a>
        <a href="order.php" class="btn order active"  > Make Order</a>
         <a href="view-orders.php" class="btn"> View Orders</a>
        </div>
        <h2 style="text-align: center;">Order Now</h2>
    <form id="orderForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="dateordered">Date of order:</label>
        <input type="date" id="dateOrdered" name="dateordered" required>
        <label for="chickType">Chick Type:</label>
        <select id="chckType" name="chickType" required>
            <option value="">Select chick Type</option>
            <option value="guinea fowl">Guinea Fowl</option>
            <option value="fowl">Local Fowl</option>
            <option value="duck">Duckling</option>
            <option value="turkey">Turkey</option>
            <option value="quail">Quails</option>
        </select>
        <label for="client">Name:</label>
        <input type="text" id="client" name="client" required>
        <label for="mobile">Client Mobile:</label>
        <input type="text" id="mobile" name="mobile" required placeholder="(+123) ">
        <label for="details">Details / Comments:</label>
        <input type="text" id="details" name="details" required>
        <label for="quantity">Quantity:</label>
        <input type="text" id="quantity" name="quantity" required>
        <label for="fee">Price:</label>
        <input type="text" id="fee" name="fee" required>
        <label for="paid">Amount Paid:</label>
        <input type="text" id="fee" name="paid" required>
        <label for="balance">Balance:</label>
        <input type="text" id="balance" name="balance" readonly>
        <label for="pickupDate">Pick up Date:</label>
        <input type="date" id="pickupDate" name="pickupDate" readonly>
        <label for="status">Status of Egg:</label>
        <input type="text" id="status" name="status" required readonly>

        <!-- Hidden input fields for balance, pickupDate and status (value of balance = fee - paid, value of pickupDate = 30 days after paid and status value is "ordered" but should display "delivered" after 30 days )-->
        <input type="hidden" id="hiddenBalance" name="hiddenBalance">
        <input type="hidden" id="hiddenPickupDate" name="hiddenPickupDate">
        <input type="hidden" id="hiddenStatus" name="hiddenStatus">
        <input type="submit" value="Submit">
    </form>
    </div>
    <script>
        // Calculate balance, pickupDate, and status on form submit
        document.getElementById('orderForm').addEventListener('submit', function() {
            var fee = parseFloat(document.getElementById('fee').value);
            var paid = parseFloat(document.getElementById('paid').value);
            var balance = fee - paid;
            document.getElementById('balance').value = balance;

            var dateOrdered = new Date(document.getElementById('dateOrdered').value);
            var pickupDate = new Date(dateOrdered);
            pickupDate.setDate(pickupDate.getDate() + 30);
            document.getElementById('pickupDate').value = pickupDate.toISOString().split('T')[0];

            var today = new Date();
            var thirtyDaysLater = new Date(dateOrdered);
            thirtyDaysLater.setDate(thirtyDaysLater.getDate() + 30);
            var status = (today > thirtyDaysLater) ? 'delivered' : 'ordered';
            document.getElementById('status').value = status;

            // Assign values to hidden fields
            document.getElementById('hiddenBalance').value = balance;
            document.getElementById('hiddenPickupDate').value = pickupDate.toISOString().split('T')[0];
            document.getElementById('hiddenStatus').value = status;
        });
    </script>
    <br>
     <div class="container">
        <h1>Zekmos Farms - Order Records</h1>
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
                    <th>Action</th>
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
