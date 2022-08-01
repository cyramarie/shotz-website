<?php
require_once 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: landpage2.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){


    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["otherid"] = $row["id"];
      if($row['admin'] == 1) {
        header("Location: admin.php");
      }
      else {
        header("Location: index.php");
      }
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

<!----LOGIN PAGE FOR CONTRIBUTORS--->
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
        <h1 class="title">LOG-IN CONTRIBUTOR</h1>
        <form class="" action="" method="post" autocomplete="off">
          <label for="usernameemail">Username or Email : </label>
          <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
          <label for="password">Password : </label>
          <input type="password" name="password" id = "password" required value=""> <br>
          <div class="center"><button type="submit" class="registerbtn" name="submit">Login</button></div>
          
        </form>
        <div class="link">
        <a href="landpage.php" class="reg-link"><ion-icon name="return-up-back-outline"></ion-icon> Back</a>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>
