<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
              <link rel="shortcut icon" href="img/chick.png">

 <meta property="zekmosfarms.org" content="Zekmos hatchapp" /> <!-- website name -->

 <meta property=""   
        content="Zekmos Hatchapp is well crafted APP, Built by a well experienced and Developer to take away the tireless effort by individuals, Firms and Institutions in Hatching endevours to bridge the gap of record keeping and creating Reminders to know the state of eggs in the incubators keeping accounts and record is very vital in the hatching business and therefore this app comes to serve this greate purpose." /> <!-- description shown in the actual shared post -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zekmos Hatching Services Application</title>
    
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
            
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px 30px;
            padding: 20px;
            justify-content: center;
            text-align: center;
/*            display: flex;*/
        }
        .container {
            text-align: left;
            margin-bottom: 20px;
            max-width: 1200px;
            
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
                a[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            
        }
      button,  .delete-button {
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
          .btn:hover {
            background-color: dodgerblue;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .entered-list {
            border: 1px solid #ccc;
            padding: 10px;
            overflow-x: auto;
        }
        .entered-list table {
            width: 100%;
            border-collapse: collapse;
        }
        .entered-list th, .entered-list td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .entered-list th {
            background-color: #f2f2f2;
        }
        .entered-list tr:nth-child(even) {
            background-color: #f2f2f2;
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
        /*blue -incubating*/
        .blue-background {
            background-color: #3498db;
            color: white;
        }
           /*lockdown*/
        .red-background {
            background-color: red;
            color: black;
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
        /*hatched already or delay*/
.gray-background {
            background-color: darkgray;
            color: white;
        }
        /*nearing hatching*/
        .lightGreen-background {
            background-color: #cfffc1;
            color: coral;
        }
        /*green- hatched*/
             .green-background {
            background-color: #008040;
            color: white;
        }
        .forest-background {
            background-color: #80ff00;
            color: white;
        }

         .hatching-records {
        margin-top: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow-x: auto; 
        /*Enable horizontal scrolling for smaller screens;*/
    }

    .hatching-records table {
        width: 100%;
        border-collapse: collapse;
    }

    .hatching-records th,
    .hatching-records td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .hatching-records th {
        background-color: #f2f2f2;
    }

    .hatching-records tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    @media screen and (max-width: 600px) {
        /* Adjust table styles for smaller screens */
        .hatching-records table {
            font-size: 3vmin;
        }
    }
    .search{
        width: 600px;
    }
    h1{
        text-align: center;
    }
    .order{
        background-color:coral;
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
    <a href="hatchapp.php" class="btn active"> Home</a>
    <a type="button" href="search.php"class="btn">Find Client </a>
 
         <a href="order.php" class="btn order" > Make Order</a>
          <a href="view-orders.php" class="btn"> View Orders</a>
    
    <div class="container">
        
    <h1>Zekmos Hatch App</h1>
    
    
    <form id="eggForm">
        
        <label for="dateLoaded">Date Egg is Loaded:</label>
        <input type="date" id="dateLoaded" name="dateLoaded" required>
        <label for="eggType">Egg Type:</label>
        <select id="eggType" name="eggType" required>
            <option value="">Select Egg Type</option>
            <option value="guinea fowl">Guinea Fowl Egg</option>
            <option value="fowl">Fowl Egg</option>
            <option value="duck">Duck Egg</option>
            <option value="turkey">Turkey Egg</option>
            <option value="quail">Quail Egg</option>
        </select>
        <label for="source">Name:</label>
        <input type="text" id="source" name="source" required>
        <label for="mobile">Client Mobile:</label>
        <input type="text" id="mobile" name="mobile" required placeholder="(+123) ">
        <label for="details">Details / Comments:</label>
        <input type="text" id="details" name="details" required>
        <label for="quantity">Quantity:</label>
          <input type="text" id="quantity" name="quantity" required>
         <label for="fee">Price:</label>
        <input type="text" id="fee" name="fee" required>
        <label for="paid">Amount Paid:</label>
        <input type="text" id="paid" name="paid" required>
        <label for="balance">Balance:</label>
        <input type="text" id="balance" name="balance"required readonly>
        <label for="lockdownDate">Lockdown Date:</label>
        <input type="date" id="lockdownDate" name="lockdownDate" required>
        <label for="status">Status of Egg:</label>
        <input type="text" id="status" name="status" required readonly>
          <!-- Hidden input fields for lockdownDate and status -->
            <input type="hidden" id="hiddenLockdownDate" name="hiddenLockdownDate">
            <input type="hidden" id="hiddenStatus" name="hiddenStatus">
        <input type="submit" value="Submit">
    </form>
    
    </div>
<!--      <a href="fetch_records.php">view Records</a>-->
<!--    <div class="entered-list" id="enteredList"></div>-->
   <script>
    document.addEventListener("DOMContentLoaded", function() {
       var fee = parseFloat(document.getElementById('fee').value);
           var paid = parseFloat(document.getElementById('paid').value);
            var balance = fee - paid;
//            const balance = document.getElementById("balance");
            document.getElementById('balance').value = balance;
        const dateLoadedInput = document.getElementById("dateLoaded");
        const eggTypeInput = document.getElementById("eggType");
        const lockdownDateInput = document.getElementById("lockdownDate");
        const statusInput = document.getElementById("status");
   
        dateLoadedInput.addEventListener("change", updateLockdownDate);
        eggTypeInput.addEventListener("change", updateLockdownDate);

        function updateLockdownDate() {
            const dateLoaded = new Date(dateLoadedInput.value);
            const eggType = eggTypeInput.value;
            let lockdownDate;

            if (!isNaN(dateLoaded.getTime()) && eggType) {
                switch (eggType) {
                    case "guinea fowl":
                    case "turkey":
                    case "duck":
                        lockdownDate = new Date(dateLoaded.getTime());
                        lockdownDate.setDate(lockdownDate.getDate() + 25);
                        break;
                    case "fowl":
                        lockdownDate = new Date(dateLoaded.getTime());
                        lockdownDate.setDate(lockdownDate.getDate() + 18);
                        break;
                    case "quail":
                        lockdownDate = new Date(dateLoaded.getTime());
                        lockdownDate.setDate(lockdownDate.getDate() + 11);
                        break;
                }

                lockdownDateInput.valueAsDate = lockdownDate;
                lockdownDateInput.disabled = true;

                const currentDate = new Date();
                const threeDayBeforeLockdown = new Date(lockdownDate.getTime());
                const threeDayAfterLockdown = new Date(lockdownDate.getTime());
                const oneDayBeforeLockdown = new Date(lockdownDate.getTime());
                oneDayBeforeLockdown.setDate(oneDayBeforeLockdown.getDate() - 1);
                threeDayBeforeLockdown.setDate(threeDayBeforeLockdown.getDate() - 3);
                threeDayAfterLockdown.setDate(threeDayAfterLockdown.getDate() + 3);
                if (currentDate < dateLoaded) {
                    statusInput.value = "Invalid date";
                    statusInput.classList.add("pink-background");
                } else if (currentDate < threeDayBeforeLockdown) {
                    statusInput.value = "Incubation Period";
                    statusInput.classList.add("blue-background");
                } else if (currentDate === threeDayBeforeLockdown) {
                    statusInput.value = "Progressing to lockdown";
                    statusInput.classList.add("yellow-background");
                    sendAlert("Lockdown alert!", "Your Egg is nearing to Lockdown. Please prepare.");
                } else if (currentDate === oneDayBeforeLockdown) {
//                    statusInput.value = "Progressing to lockdown";
                    statusInput.value = "In lockdown";
                    statusInput.classList.add("green-background");
                    sendAlert("First Lockdown alert!", "Please your eggs need to be Locked down Today!. Ensure to Lockdown eggs.");
                } else if (currentDate === lockdownDate) {
//                    statusInput.value = "Progressing to lockdown";
                    statusInput.value = "In lockdown";
                    statusInput.classList.add("red-background");
                    sendAlert("Final Lockdown alert!", "Please Lockeddown your eggs. Ensure to Lockdown.");
                }
                else if (currentDate === threeDayAfterLockdown) {
                    statusInput.value = "Hatched";
                    statusInput.classList.add("green-background");
                    sendAlert("Hatching alert!", "Eggs are hatched. Please remove your new baby  chicks to a brooder room.");
                } else if (currentDate > threeDayAfterLockdown) {
                    statusInput.value = "Hatched";
                    statusInput.classList.add("forest-background");
                    sendAlert("Hatched!", "Eggs have been Hatched.");
                }
                else {
                    statusInput.value = "Hatched eggs already";
                    statusInput.classList.add("gray-background");
                }

                statusInput.disabled = true;
            } else {
                lockdownDateInput.value = '';
                lockdownDateInput.disabled = false;
                statusInput.value = '';
                statusInput.disabled = false;
                statusInput.className = ""; // Reset classes
            }
        }

        function sendAlert(title, message) {
            console.log(title + ": " + message);
        }

        const eggForm = document.getElementById('eggForm');
        eggForm.addEventListener('submit', submitForm);

   function submitForm(event) {
    event.preventDefault();
    updateHiddenFields();

    // Recalculate balance
    const fee = parseFloat(document.getElementById('fee').value);
    const paid = parseFloat(document.getElementById('paid').value);
    const balance = fee - paid;

    // Set the recalculated balance in the form
    document.getElementById('balance').value = balance;

    // Get lockdownDate and status values
    const lockdownDateValue = document.getElementById("lockdownDate").value;
    const statusValue = document.getElementById("status").value;
    const balanceValue = document.getElementById("balance").value;

    // Append lockdownDate and status to formData
    const formData = new FormData(eggForm);
    formData.append("lockdownDate", lockdownDateValue);
    formData.append("status", statusValue);
    formData.append("balance", balanceValue);
    
    // Submit form data
    fetch('submit.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(data => {
        console.log(data);
        displayMessage("Egg details Loaded successfully");
    })
    .catch(error => {
        console.error('Error:', error);
        displayMessage("Loading Egg details failed. Please try again later.");
    });
}
        function updateHiddenFields() {
            const hiddenLockdownDateInput = document.getElementById("hiddenLockdownDate");
            const hiddenStatusInput = document.getElementById("hiddenStatus");

            hiddenLockdownDateInput.value = lockdownDateInput.value;
            hiddenStatusInput.value = statusInput.value;
        }

        function displayMessage(message) {
            const messageElement = document.createElement('div');
            messageElement.textContent = message;
            document.body.appendChild(messageElement);
            setTimeout(() => {
                messageElement.remove();
            }, 5000);
        }
    });
</script>

<div class="hatching-records">
    <?php
    // Include the database connection file
    include 'connections.php';

    // Check if the delete form is submitted
    if (isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        // Query to delete record from the database
        $delete_sql = "DELETE FROM hatchappp WHERE id = $delete_id";
        if ($conn->query($delete_sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    // Query to fetch records from the database
    $sql = "SELECT * FROM hatchappp";
    $result = $conn->query($sql);

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
                    $statusClass = "pink";
                    break;
                case "Loaded in Incubator":
                    $statusClass = "blue-background";
                    break;
                case "Progressing to lockdown":
                    $statusClass = "yellow-background";
                case "In lockdown":
                    $statusClass = "red-background";
               
                case "Hatching":
                    $statusClass = "forest-background";
                    break;
                 case "Hatched":
                    $statusClass = "green-background";
                    break;
                
                default:
                    $statusClass = "gray-background";
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
        echo "No records found";
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

<!--<script src="script.js"></script>-->
<script src="reminder.php"></script>
    
</body>
</html>
