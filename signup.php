<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "okademi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    // Validate inputs
    if (empty($name) || empty($phone) || empty($email) || empty($password) || empty($age) || empty($gender)) {
        echo "All fields are required!";
    } elseif (!preg_match('/^\d{10}$/', $phone)) {
        echo "Please enter a valid 10-digit phone number.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address.";
    } elseif (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO user (Name, Phone_Number, Email_ID, Password, Age, Gender) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $phone, $email, $hashed_password, $age, $gender);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New record created successfully";
            // Optionally, redirect to a success page or login page
            header("Location: login.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>
