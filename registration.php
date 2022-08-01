<?php
require_once 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: loginusers.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $contact= $_POST["contact"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO request VALUES('','$name','$username','$email','$password', '$contact')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful! Please wait for the admin to approve your account!'); </script>";
      
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>


<!----REGISTRATION PAGE FOR CUSTOMERS--->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Registration</title>
  </head>
  <body>
   
    <div class="loginbox">
    <h1 class="title">Registration</h1>
      <form class="" action="" method="post" autocomplete="off">
        <label for="name">Name : </label>
        <input type="text" name="name" id = "name" required value=""> <br>
        <label for="username">Username : </label>
        <input type="text" name="username" id = "username" required value=""> <br>
        <label for="email">Email : </label>
        <input type="email" name="email" id = "email" required value=""> <br>
        <label for="email">Contact Number : </label>
        <input type="text" name="contact" id = "contact" required value=""> <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id = "password" required value=""> <br>
        <label for="confirmpassword">Confirm Password : </label>
        <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
        
        <div class="center">

        <button type="submit" class="registerbtn" name="submit">Register</button>
</div>
        </form>
          <div class="link">
            <a href="landpage.php" class="reg-link"><ion-icon name="return-up-back-outline"></ion-icon> Back</a>
            <a href="loginusers.php" class="reg-link"><ion-icon name="log-in-outline"></ion-icon> Log-in</a>
        </div>
    <div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>
