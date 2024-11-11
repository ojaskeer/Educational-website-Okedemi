<?php
session_save_path("C:/xampp/tmp");
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "okademi";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        // Fetch user data from the database
        $stmt = $conn->prepare("SELECT Name, Password FROM user WHERE Email_ID = :email AND Phone_Number = :phone");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $name = $user['Name'];
            $hashed_password = $user['Password'];

            // Check if the password matches
            if (password_verify($password, $hashed_password)) {
                // Set session variables
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $name;

                // Set cookies
                setcookie("name", $name, time() + (30 * 24 * 60 * 60), "/");
                setcookie("email", $email, time() + (30 * 24 * 60 * 60), "/");

                // Redirect to the main page
                header("Location: mp.php");
                exit();
            } else {
                // Incorrect password - display an alert
                echo "<script>alert('Incorrect password.'); window.location.href='login.html';</script>";
            }
        } else {
            // User not found - display an alert
            echo "<script>alert('No user found with the given email and phone number.'); window.location.href='login.html';</script>";
        }
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$conn = null;
?>
