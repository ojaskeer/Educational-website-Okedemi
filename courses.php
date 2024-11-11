<?php
// Include PHPMailer classes via Composer autoload
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection credentials
$host = 'localhost';
$db = 'okademi';
$user = 'root';
$pass = '';

// Create a PDO connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Insert data into the database if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the user name and email from cookies, or use default values
    $user_name = isset($_COOKIE['name']) ? $_COOKIE['name'] : 'Guest';
    $user_email = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
    $course_name = $_POST['course_name'];
    $batch = $_POST['batch'];

    // Prepare and execute the insert query
    $stmt = $conn->prepare("INSERT INTO registrations (user_name, course_name, batch) VALUES (:user_name, :course_name, :batch)");
    $stmt->bindParam(':user_name', $user_name);
    $stmt->bindParam(':course_name', $course_name);
    $stmt->bindParam(':batch', $batch);

    if ($stmt->execute()) {
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ojas.keer@somaiya.edu';    // Replace with your Gmail address
            $mail->Password = 'mkkk dcev xnxl jiwa';       // Replace with your App Password if 2FA is enabled
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Sender and recipient settings
            $mail->setFrom('ojas.keer@somaiya.edu', 'Okademi'); // Replace with your email and name
            $mail->addAddress($user_email, $user_name);

            // Email subject and body
            $mail->Subject = "Course Registration Confirmation";
            $mail->Body = "Hello $user_name,\n\nYou have successfully registered for the following course:\n\n"
                        . "Course Name: $course_name\n"
                        . "Batch: $batch\n\n"
                        . "Thank you for registering with Okademi!\n\nBest Regards,\nOkademi Team";

            // Send the email
            $mail->send();

            // Show success alert and redirect
            echo "<script>alert('Registration successful for $course_name - $batch. Confirmation email sent.'); window.location.href = 'mycourse.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Registration successful, but email could not be sent. Error: {$mail->ErrorInfo}');</script>";
        }
    } else {
        echo "<script>alert('Error occurred during registration. Please try again.'); window.history.back();</script>";
    }
}

$conn = null;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration</title>
    <style>
        body {
            background: linear-gradient(to right, #4caf50, #10603b);
            font-family: Arial, sans-serif;
            margin: 0; 
            padding: 0;
        }
        .frame-container {
            width: calc(70% - 100px);
            margin: 20px auto;
            background-color: #f9f7e8;
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
        }
        table {
            width: 80%;
            margin: 20px auto;
            background-color: #f9f7e8;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .form-button {
            padding: 8px 15px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color:  #f9f7e8;border-bottom: 2px solid #34693a;">
  <div class="container-fluid">
    <div class="icon">
      <img src="images/okedemi_final_logo.jpeg" alt="logo" style="height: 50px; padding-right: 20px;">
    </div>
    <div class="navbar-header">
      <a class="navbar-brand" href="mp.php" style="font-family: anton-regular; font-size: xx-large; padding-bottom: 10px;">
        <b>OKADEMI</b>
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
            style="padding-top: 15px;">
            <b>Study Materials</b>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="syllabus.html#Maths">Maths</a></li>
            <li><a class="dropdown-item" href="syllabus.html#Physics">Physics</a></li>
            <li><a class="dropdown-item" href="syllabus.html#Chemistry">Chemistry</a></li>
            <li><a class="dropdown-item" href="syllabus.html#Biology">Biology</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
            style="padding-top: 15px;">
            <b>Paid Courses</b>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="courses.php#mains">Mains</a></li>
            <li><a class="dropdown-item" href="courses.php#advanced">Advanced</a></li>
            <li><a class="dropdown-item" href="courses.php#neet">Neet</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mycourse.php" style="padding-top: 15px;"><b>My Courses</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.facebook.com/"><img src="/Educational-website-Okedemi/images/Facebook_Logo_(2019).png.webp" style="height: 40px; padding-left: 15px;padding-bottom: 5px;"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.youtube.com/"><img src="/Educational-website-Okedemi/images/ytlogo.png" style="height: 50px; padding-left: 20px;padding-bottom: 10px;"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.instagram.com/?hl=en"><img src="images/instalogo.jpg" style="height: 40px; padding-left: 20px;padding-bottom: 5px;"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="www.twitter.com/x"><img src="images/Xlogo.png" style="height: 40px; padding-left: 20px;padding-bottom: 5px;"></a>
        </li>
      </ul>
      <form class="d-flex" role="search" onsubmit="searchFunction(); return false;">
        <input class="form-control me-2" type="search" id="searchInput" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" style="border-width: 2px;"><b>Search</b></button>
      </form>
    </div>
  </div>
</nav>

<main>
    <h1 style="text-align: center; color: #f9f7e8;">Course Registration</h1>

    <!-- Course Frames with Forms -->
    <div class="frame-container">
        <h2>JEE Mains</h2>
        <p><b>Schedule:</b> Monday to Friday, 9:00 AM to 1:00 PM</p>
        <p><b>Course Fee:</b> $500</p>
        <form method="POST" action="">
            <input type="hidden" name="course_name" value="JEE Mains">
            <select name="batch" required>
                <option value="Batch 1 - Before April 30, 2024">Batch 1 - Before April 30, 2024</option>
                <option value="Batch 2 - Before May 31, 2024">Batch 2 - Before May 31, 2024</option>
                <option value="Batch 3 - Before June 15, 2024">Batch 3 - Before June 15, 2024</option>
            </select>
            <button type="submit" class="form-button">Register</button>
        </form>
    </div>

    <div class="frame-container">
        <h2>JEE Advanced</h2>
        <p><b>Schedule:</b> Monday to Friday, 2:00 PM to 6:00 PM</p>
        <p><b>Course Fee:</b> $800</p>
        <form method="POST" action="">
            <input type="hidden" name="course_name" value="JEE Advanced">
            <select name="batch" required>
                <option value="Batch 1 - Before April 30, 2024">Batch 1 - Before April 30, 2024</option>
                <option value="Batch 2 - Before May 31, 2024">Batch 2 - Before May 31, 2024</option>
                <option value="Batch 3 - Before June 15, 2024">Batch 3 - Before June 15, 2024</option>
            </select>
            <button type="submit" class="form-button">Register</button>
        </form>
    </div>

    <div class="frame-container">
        <h2>NEET</h2>
        <p><b>Schedule:</b> Monday to Friday, 10:00 AM to 2:00 PM</p>
        <p><b>Course Fee:</b> $600</p>
        <form method="POST" action="">
            <input type="hidden" name="course_name" value="NEET">
            <select name="batch" required>
                <option value="Batch 1 - Before April 30, 2024">Batch 1 - Before April 30, 2024</option>
                <option value="Batch 2 - Before May 31, 2024">Batch 2 - Before May 31, 2024</option>
                <option value="Batch 3 - Before June 15, 2024">Batch 3 - Before June 15, 2024</option>
            </select>
            <button type="submit" class="form-button">Register</button>
        </form>
    </div>

</main>

<?php $conn = null; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
