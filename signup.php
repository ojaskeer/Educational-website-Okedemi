<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "okademi";

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO user (Name, Phone_Number, Email_ID, Password, Age, Gender) VALUES (:name, :phone, :email, :password, :age, :gender)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':gender', $gender);

            // Execute the statement
            if ($stmt->execute()) {
                echo "New record created successfully";
                // Optionally, redirect to a success page or login page
                header("Location: login.html");
                exit();
            } else {
                echo "Error: Could not execute the query.";
            }

            // Close statement
            $stmt = null; // Optional, PDO closes the statement automatically
        }
    }
} catch (PDOException $e) {
    // Handle any connection errors
    die("Connection failed: " . $e->getMessage());
}

// Close connection (optional, as PDO closes the connection automatically)
$conn = null;
?>
