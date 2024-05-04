<?php
include 'connections.php'; // Include the database connection file


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an array to store error messages
    $errors = [];

    // Retrieve form data and perform basic validation
    $dateLoaded = isset($_POST['dateLoaded']) ? $_POST['dateLoaded'] : '';
    $eggType = isset($_POST['eggType']) ? $_POST['eggType'] : '';
    $source = isset($_POST['source']) ? $_POST['source'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $details = isset($_POST['details']) ? $_POST['details'] : '';
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
     $fee = isset($_POST['fee']) ? $_POST['fee'] : '';
      $paid = isset($_POST['paid']) ? $_POST['paid'] : '';
       $balance = isset($_POST['balance']) ? $_POST['balance'] : '';
    $lockdownDate = isset($_POST['lockdownDate']) ? $_POST['lockdownDate'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    // Validate form fields (you can add more specific validation as needed)
    if (empty($dateLoaded)) {
        $errors[] = "Date Egg is Loaded is required.";
    }
    if (empty($eggType)) {
        $errors[] = "Egg Type is required.";
    }
    // Add more validation rules for other fields if needed...

    // If there are no errors, proceed to insert data into the database
    if (empty($errors)) {
        // Prepare SQL statement to insert data into the database
        $sql = "INSERT INTO hatchappp (dateLoaded, eggType, source, mobile, details, quantity,fee,paid,balance, lockdownDate, status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?,?)";

        // Prepare and bind parameters to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssss", $dateLoaded, $eggType, $source, $mobile, $details, $quantity,$fee,$paid,$balance, $lockdownDate, $status);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "New record created successfully";
            // Optionally, you can redirect the user to another page after successful insertion
            // header("Location: success.php");
            // exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        // If there are errors, display them to the user
        echo "<strong>Error(s) occurred:</strong><br>";
        foreach ($errors as $error) {
            echo "- " . $error . "<br>";
        }
    }
} else {
    // If the request method is not POST, redirect to the form page
    header("Location: hatchapp.html");
    exit();
}
?>
