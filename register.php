<?php
require 'connection.php'; // Include the db_connection.php file

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $age = $_POST["age"];
    $level = $_POST["level"];
    $score = $_POST["score"];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $message = "Passwords do not match!";
    } else {
        // Hash the password before saving to the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL statement to insert user data into the database
        $stmt = $conn->prepare("INSERT INTO users (username, password, age, level, score) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisi", $username, $hashedPassword, $age, $level, $score);
        
        if ($stmt->execute()) {
            $message = "User registered successfully!";
        } else {
            $message = "Error registering user: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 20px auto;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #ff6600;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #cc5500;
        }
    </style>
</head>
<body>
  
    <div class="container">
        <h1>User Registration</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
            <input type="number" name="age" placeholder="Age" required>
            <select name="level" required>
                <option value="" disabled selected>Select Level</option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
            <input type="number" name="score" placeholder="Score" required>
            <input type="submit" value="Register">
        </form>
        <p><?php echo $message; ?></p>
    </div>
</body>
</html>
