<?php 
session_start();
if (isset($_SESSION["user"])){
  header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style_reg.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>
<div class="bg-img">
    <div class="content">
      <header>Register</header>
      <?php 
      if(isset($_POST["submit"])) {
        
        $fullName = $_POST["fullname"];
        $email = $_POST["email"];        
        $password = $_POST["password"];
        $passwordRepeat = $_POST["repeat_password"];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        require_once "database1.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        $rowCount = mysqli_num_rows($result);
        if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
          array_push($errors,"All fields are required");
         }
        if($rowCount>0){
          array_push($errors, "Email already exits!");
        }
        if(!preg_match("/^[a-zA-Z ]*$/", $fullName)){
          array_push($errors, "Username should contain only alphabets!");
        } 
        if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
          array_push($errors, "Invalid email address format! ");
        }
        if (strlen($password)<8) {
          array_push($errors,"Password must be at least 8 charactes long");
         }
        if($password != $passwordRepeat) {
          array_push($errors, "Passwords do not match!");
        }

        if(count($errors)>0) {
          echo "<div style='position: absolute; top: -10%; left: 50%; transform: translate(-50%, -50%); background-color: #f13737; color: white; padding: 10px; border-radius: 10px;'>";
          foreach($errors as $error){
              echo "<span>$error</span><br>";
          }
          echo "</div>";
        } else {

          $sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo '<script>alert("You are registered successfully.");window.location="login_make.php"</script>';
            }else{
                die("Something went wrong");
            }
        }
      }
      ?>

      <form action="register_make.php" method="post">
        <div class="field" style="margin: 0 0 15px;">
            <span class="fa fa-user"></span>
            <input type="text" required placeholder="Username" name="fullname">
        </div>
        <div class="field" style="margin: 0 0 15px;">
          <span class="fa fa-envelope"></span>
          <input type="text" required placeholder="Email" name="email">
        </div>
        <div class="field space" style="margin: 0 0 15px;">
          <span class="fa fa-lock"></span>
          <input type="password" class="pass-key" required placeholder="Password" name="password">
          <span class="show">SHOW</span>
        </div>
        <div class="field space" style="margin: 0 0 15px;">
            <span class="fa fa-lock"></span>
            <input type="password" class="pass-key" required placeholder="Repeat Password" name="repeat_password">
            <span class="show">SHOW</span>
        </div>
        <div class="field">
            <input type="submit" value="SIGNUP" name="submit">
        </div>
      </form>
      <br>
      <div>
        <div class="signup">Already registered ?
          <a href="login_make.php"> Login here</a>
        </div>
      </div>
  </div>
    <script src="try2.js"></script>
</body>
</html>