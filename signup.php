<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "zartzurt";

// Create a new PDO instance
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the submitted form data
  $email = $_POST['email'];
  $username = $_POST['username'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  // Hash the password
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Insert the user into the database
  $sql = "INSERT INTO users (email, username, phone, password) VALUES (:email, :username, :phone, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':phone', $phone);
  $stmt->bindParam(':password', $hashedPassword);

  if ($stmt->execute()) {
    echo 'Signup successful<br>';
    echo 'Email: ' . $email . '<br>';
    echo 'Username: ' . $username . '<br>';
    echo 'Phone: ' . $phone . '<br>';
    echo 'Password: ' . $password;

    // Redirect to login.html
    header("Location: login.php");
    exit();
  } else {
    echo 'Error: ' . $sql . '<br>' . $stmt->errorInfo()[2];
  }
}

// Close the database connection
$conn = null;
?>
