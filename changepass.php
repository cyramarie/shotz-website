<?php
require_once 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id = $id"));
}

if(!empty($_SESSION["otherid"])){
    $id1 = $_SESSION["otherid"];
    $result1 = mysqli_query($conn, "SELECT * FROM user WHERE id = $id1");
    $rowt = mysqli_fetch_assoc($result1);
    $user1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id = $id"));
  }

else{
  header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Shotz | Change Password</title>
    <link rel="stylesheet" href="editprofilestyle.css" type="text/css">
</head>

<body class="bg-light" id="body">

<!--Navigation start-->
	<header>
			<nav>
				<a href="landpage.php">
					<img src="shotz_logo.png" alt="logo" class="logo">	
				</a>
				<div class="nav-links">
					<ul>
						<li><a><?php echo $row["name"]; ?> | </a></li>
						<li><a href="index.php">Upload</a></li>
						<li><a href="editprofile.php" class="active">Profile</a></li>
						<li><a href="logout.php">Logout</a></li>
						<li><i onclick="openNav()" class="fas fa-bars fa-2x menu"></i></li>
					</ul>
				</div>
			</nav>

			<div id="side-nav">
				<i onclick="closeNav()" class="fas fa-times fa-2x"></i>
				<a><?php echo $row["name"]; ?></a>
				<a href="index.php">Upload</a>
				<a href="editprofile.php" class="active" style="color:#FCA311;">Profile</a>
				<a href="logout.php">Log out</a> 
			</div>

			
				<!-- input change password -->

	</header>
	
	<div class="change-pass-box">
	<div class="content">
			<h1 class="change-pass-lbl">Change Password</h1>
		</div>

		<form class="" action="" method="post" autocomplete="off">
				<label for="password">Current password</label>
				<input type="password" name="password" id="password" required>

				<label for="new-pass">New password</label> 
				<input type="password" name="new-pass" id ="new-pass" required> 
				
				<button type="submit" class="save-btn" name="submit">Change Password</button>
		</form>
		
		<!-- change password to database -->
		<?php
			if(isset($_POST["submit"])){
				$password = $_POST['password'];
				$newpass = $_POST['new-pass'];
				$result = mysqli_query($conn, "SELECT password FROM user WHERE id = $id");
				$row = mysqli_fetch_assoc($result);
				if($password == $row['password']){
					$query = "UPDATE user SET password = '$newpass' WHERE id = $id";
					mysqli_query($conn, $query);
					header("Location: index.php");
				}
				else{
				  echo "<script> alert('Wrong Password'); </script>";
				}
			}
		?>
	</div>

	
	<script type="text/javascript">
		document.getElementById("image").onchange = function(){
		 document.getElementById("form").submit();
		};
	</script>
	<script>
			const sideNav = document.getElementById('side-nav');

			function openNav() {
				if(sideNav.style.width == '250px') {
					sideNav.style.width = '0';
				} else {
					sideNav.style.width = '250px';
				}
			}

			function closeNav() {
				sideNav.style.width = '0';
			}
			
			function logIn() {
				if(document.getElementById('login').innerHTML == "Log in") {
					document.getElementById('login').innerHTML = "Log out";
				} else {
					document.getElementById('login').innerHTML = "Log in";
				}
			}
	</script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	</body>
</html>