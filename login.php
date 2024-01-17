<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "zartzurt";

// Create a new PDO instance
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the submitted username and password
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Fetch the user from the database
  // select kullanuicilar arasindan dogru kullaniciyi secmek icin get
  $sql = "SELECT * FROM users WHERE username = :username";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':username', $username);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // Verify the password
  if ($user && password_verify($password, $user['password'])) {
    // Set session variable for logged in user
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user['id'];
    ?>
    <script>
      // Redirect to renting.html
      window.location.href = "http://localhost/ridex-master/renting.html";
    </script>
    <?php
    exit();
  } else {
    echo 'Invalid username or password';
  }
}

// Close the database connection
$conn = null;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login/Sign Up Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h2>Login</h2>
      <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
      </form>
    </div>
    <div class="form-container">
      <h2>Sign Up</h2>
      <form action="signup.php" method="POST">
        <input type="text" name="email" placeholder="Email" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Sign Up</button>
      </form>
    </div>
  </div>
</body>
</html>
