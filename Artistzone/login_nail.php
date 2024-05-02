<?php
session_start();
if (isset($_SESSION["user"])) {
  header("Location: nail_art.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style_nail(login).css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>
<div class="bg-img">
    <div class="content">
      <header>Login Form</header>
      <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database1.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    $_SESSION["logged_in"] = true; // set logged in status to true

                    echo '<script>alert("You have Login successfully...");window.location="nail_booking.php"</script>';
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login_nail.php" method="POST">
        <div class="field">
          <span class="fa fa-user"></span>
          <input type="text" required placeholder="Email" name="email">
        </div>
        <div class="field space">
          <span class="fa fa-lock"></span>
          <input type="password" class="pass-key" required placeholder="Password" name="password">
          <span class="show">SHOW</span>
        </div>
        <br>
        <div class="field">
          <input type="submit" value="LOGIN" name="login">
        </div>
      </form>
      <br>
      <div class="signup">Don't have account?
        <a href="register_nail.php">Signup Now</a>
      </div>
    </div>
  </div>
    <script src="try2.js"></script>
</body>
</html>