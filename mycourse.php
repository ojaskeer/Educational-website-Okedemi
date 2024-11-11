<?php
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

// Retrieve the logged-in user's name from the cookie
$user_name = isset($_COOKIE['name']) ? $_COOKIE['name'] : 'Guest';

// Fetch registrations for this user
$stmt = $conn->prepare("SELECT course_name, batch, registration_date FROM registrations WHERE user_name = :user_name ORDER BY registration_date DESC");
$stmt->bindParam(':user_name', $user_name);
$stmt->execute();
$registrations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Close the connection
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses</title>
    <style>
        body {
            background: linear-gradient(to right, #4caf50, #10603b);
            font-family: Arial, sans-serif;
            margin: 0; 
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #f9f7e8;
            padding: 20px;
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
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

<div class="container">
    <h1 style="text-align: center; color: #34693a;">My Registered Courses</h1>
    <table>
        <thead>
            <tr>
                <th>Course</th>
                <th>Batch</th>
                <th>Registration Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($registrations)) {
                foreach ($registrations as $registration) {
                    echo "<tr><td>{$registration['course_name']}</td><td>{$registration['batch']}</td><td>{$registration['registration_date']}</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3' style='text-align: center;'>No registrations found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
