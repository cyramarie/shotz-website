<?php
require_once 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: landpage2.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $active = "y";
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$usernameemail' AND active ='$active'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["otherid"] = $row["id"];
      header("Location: landpage2.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>


<!----LOGIN PAGE FOR USERS--->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
  </head>
  <body>
    <div class="loginbox">
      <div class="center">
        <a href="landpage.php">
          <img src="shotz_logo.png" alt="logo" class="logo center">
        </a>
      </div>
        <h1 class="title">LOG-IN PREMIUM ACCOUNT</h1>
        <form class="" action="" method="post" autocomplete="off">
          <label for="usernameemail">Username or Email : </label>
          <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
          <label for="password">Password : </label>
          <input type="password" name="password" id = "password" required value=""> <br>
          <button type="submit" class="registerbtn" name="submit">Log in</button><br>
          <a href="landpage.php" class="reg-link"><ion-icon name="return-up-back-outline"></ion-icon> Back</a>
          <a href="registration.php" class="reg-link"><ion-icon name="log-in-outline"></ion-icon> Register</a>
        </form>
    </div>  
    <!--
    <div class="link">
          <a href="landpage.php" class="back-link"><ion-icon name="return-up-back-outline"></ion-icon> Back</a>
    </div>
    -->
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>
