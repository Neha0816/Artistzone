<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login_make.php");
   exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get input values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
  
    // Validate input values
    $errors = array();
    if (empty($name)) {
      $errors[] = "Name is required";
    }
    if (empty($email)) {
      $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Invalid email format";
    }
    if (empty($date)) {
      $errors[] = "Date is required";
    }
    if (empty($time)) {
      $errors[] = "Time is required";
    }
  
    // Check if there are any errors
    if (count($errors) == 0) {
  
      // Connect to database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "login_register";
  
      $conn = new mysqli($servername, $username, $password, $dbname);
  
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      // Check if user exists in nail_users table
      $user_query = "SELECT * FROM users WHERE fullname='$name' AND email='$email'";
      $user_result = $conn->query($user_query);
      if ($user_result->num_rows == 0) {
        $errors[] = "Please login first or enter valid name and email.";
      } else {
        // Check if the appointment already exists
        $sql = "SELECT * FROM booking WHERE username='$name' AND email='$email' AND date='$date' AND time='$time'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $errors[] = "This appointment is already booked. Please choose a different date or time.";
        } else {
          // Insert the appointment into the database
          $sql = "INSERT INTO booking (username, email, date, time) VALUES ('$name', '$email', '$date', '$time')";
          if ($conn->query($sql) === TRUE) {
              echo "<script>alert('Appointment booked successfully!'); window.location='nail_art.php';</script>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
      }
  
      // Close connection
      $conn->close();
      
    }
    else {
        echo "<script>alert('" . implode("\\r\\n", $errors) . "');</script>";
        }
  }
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking</title>
<link rel="stylesheet" href="booking.css">
<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700,900" rel="stylesheet">
</head>
<body>
<div class="container">
    
    <div class="container-time">
        <h2 class="heading">Time Open</h2>
        <h3 class="heading-day">Monday-Friday</h3>
        <p>9am - 11am </p>
        <p>11am - 10pm</p>

        <h3 class="heading-day">Saturday and sunday</h3>
        <p>9am - 1am </p>
        <p>1am - 10pm </p>

        <hr>

        <h4 class="heading-phone">Call Us: (123) 45-45-456</h4>
    </div>
    <div class="container-form">
        <form action="nail_booking.php" method="POST">
            <h2 class="heading heading-day1">Online Booking</h2>
            
            <div class="form-field">
                <p>Your Name</p>
                <input type="text" placeholder="Your Name" name="name">
            </div>
            <div class="form-field">
                <p>Your email</p>
                <input type="email" placeholder="Your email" name="email">
            </div>
            <div class="form-field">
                <p>Date</p>
                <input type="date" name="date">
            </div>
            <div class="form-field">
                <p>Time</p>
                <input type="time" name="time">
            </div>
            
            <button class="btn" name="submit">Submit</button>
        </form>
    </div>
</div>
</body>
</html>