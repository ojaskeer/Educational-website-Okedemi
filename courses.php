<?php
// Database connection credentials
$host = 'localhost:3307'; // Your host
$db = 'okademi'; // Your database name
$user = 'root'; // Your database username
$pass = ''; // Your database password

// Create a PDO connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Insert data into the database if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = "John Doe"; // Replace with actual logged-in user’s name
    $course_name = $_POST['course_name'];
    $batch = $_POST['batch'];

    // Prepare and execute the insert query
    $stmt = $conn->prepare("INSERT INTO registrations (user_name, course_name, batch) VALUES (:user_name, :course_name, :batch)");
    $stmt->bindParam(':user_name', $user_name);
    $stmt->bindParam(':course_name', $course_name);
    $stmt->bindParam(':batch', $batch);

    if ($stmt->execute()) {
        echo "<p style='color: green; text-align: center;'>Registration successful for $course_name - $batch</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error occurred during registration. Please try again.</p>";
    }
}
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
</head>
<body>

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

    <!-- Registered Courses Table -->
    <h2 style="text-align: center; color: #f9f7e8;">My Registered Courses</h2>
    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Course</th>
                <th>Batch</th>
                <th>Registration Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch and display registered courses from the database
            $stmt = $conn->query("SELECT user_name, course_name, batch, registration_date FROM registrations ORDER BY registration_date DESC");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>{$row['user_name']}</td><td>{$row['course_name']}</td><td>{$row['batch']}</td><td>{$row['registration_date']}</td></tr>";
            }
            ?>
        </tbody>
    </table>
</main>

<?php $conn = null; ?>
</body>
</html>
