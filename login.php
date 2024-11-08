<?php
session_save_path("C:/xampp/tmp");
session_start();


$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "okademi";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Form received<br>";

        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT Name, Password FROM user WHERE Email_ID = :email AND Phone_Number = :phone");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "User found in database<br>";

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $name = $user['Name'];
            $hashed_password = $user['Password'];

            if (password_verify($password, $hashed_password)) {
                echo "Password verified<br>";

                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $name;

                header("Location: mp.php");
                exit();
            } else {
                echo "Incorrect password<br>";
                echo "<script>alert('Incorrect password'); window.history.back();</script>";
            }
        } else {
            echo "No user found with the given email and phone number<br>";
            echo "<script>alert('No user found with the given email and phone number'); window.history.back();</script>";
        }
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$conn = null;
?>
