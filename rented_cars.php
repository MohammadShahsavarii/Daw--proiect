<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rented Cars</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .section.featured-car {
      background-color: #f5f5f5;
      padding: 80px 0;
      text-align: center;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .title-wrapper {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 40px;
    }

    .section-title {
      font-size: 24px;
      margin: 0;
    }

    .featured-car-link {
      display: flex;
      align-items: center;
      text-decoration: none;
      font-size: 14px;
      color: #333;
    }

    .featured-car-link span {
      margin-right: 5px;
    }

    .featured-car-card {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .card-banner {
      margin-bottom: 20px;
    }

    .card-title-wrapper {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .card-title {
      margin: 0;
    }

    .card-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .card-list-item {
      display: flex;
      align-items: center;
      margin-bottom: 5px;
    }

    .card-item-text {
      margin-left: 5px;
    }

    .card-price-wrapper {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 10px;
    }

    .card-price {
      font-size: 18px;
      margin: 0;
    }

    .btn {
      background-color: #333;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    .btn-go-main {
      margin-top: 20px;
    }
  </style>
</head>

<body>
 
  <section class="section featured-car">
    <div class="container">
      <div class="title-wrapper">
        <h2 class="h2 section-title">Your Rented Cars</h2>
      </div>
      <?php
      // Retrieve the user ID from the session or any other authentication mechanism
      $userID = 1; // Replace with your user ID retrieval logic

      // Connect to the MySQL database
      $servername = "localhost";
      $username = "root";
      $password = "12345678";
      $dbname = "zartzurt";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Prepare and execute the SQL statement to retrieve rented cars for the user
      $sql = "SELECT car_name, rental_date, location FROM rented_cars WHERE user_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $userID);
      $stmt->execute();
      $result = $stmt->get_result();

      // Check if any rented cars were found
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $carName = $row["car_name"];
              $rentalDate = $row["rental_date"];
              $location = $row["location"];
      ?>
              <div class="featured-car-card">
                <div class="card-title-wrapper">
                  <h3 class="card-title"><?php echo $carName; ?></h3>
                </div>
                <ul class="card-list">
                  <li class="card-list-item">
                    <span class="card-item-text">Rental Date:</span>
                    <span><?php echo $rentalDate; ?></span>
                  </li>
                  <li class="card-list-item">
                    <span class="card-item-text">Location:</span>
                    <span><?php echo $location; ?></span>
                  </li>
                </ul>
              </div>
          <?php
          }
          ?>
          <a href="index.html" class="btn btn-go-main">Go to Main Page</a>
      <?php
      } else {
          echo "No rented cars found.";
      }

      $stmt->close();
      $conn->close();
      ?>
    </div>
  </section>
</body>

</html>
