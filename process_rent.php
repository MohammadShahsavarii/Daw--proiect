<?php
session_start();

// Retrieve the user ID from the session or any other authentication mechanism
if(isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];
} else {
    // Redirect the user to the login page or display an error message
    header("Location: login.php");
    exit();
}

// Get the form data
$carName = $_POST['car'];
$rentalDate = $_POST['date'];
$location = $_POST['location'];

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "zartzurt";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement to insert the rented car details
$sql = "INSERT INTO rented_cars (user_id, car_name, rental_date, location) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $userID, $carName, $rentalDate, $location);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect the user to a page where they can view their rented cars
header("Location: rented_cars.php");
exit();
?>
