<?php
session_start();

// Check if the car ID is provided
if (isset($_POST['carID'])) {
    $carID = $_POST['carID'];

    // Retrieve the user ID from the session or any other authentication mechanism
    if (isset($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];

        // Connect to the MySQL database
        $servername = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "zartzurt";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL statement to delete the car from the rented_cars table
        $sql = "DELETE FROM rented_cars WHERE id = ? AND user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $carID, $userID);
        $stmt->execute();

        // Check if the deletion was successful
        if ($stmt->affected_rows > 0) {
            echo "Car removed successfully.";
        } else {
            echo "Failed to remove car.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "User ID not found.";
    }
} else {
    echo "Car ID not provided.";
}
?>
