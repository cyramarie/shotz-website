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
    <title>Shotz | <?php echo $row["name"]; ?>'s profile</title>
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
				<a href="editprofile.php" class="active" style="color:#FCA311">Profile</a>
				<a href="logout.php">Log out</a> 
			</div>

		<div class="content">
			<h1>Profile Settings</h1>
			<!--START PROFILE PIC-->
			<form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
				<div class="upload">
					<?php
						$id = $row["id"];
						$name = $row["name"];
						$image = $row["image"];
					?>
					<img src="img/<?php echo $image; ?>" width = 125 height = 125 title="<?php echo $image; ?>">
					<div class="round">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="name" value="<?php echo $name; ?>">
						<input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
						<i class = "fa fa-camera" style = "color: #fff;"></i>
					</div>
				</div>
			</form>

			<?php
				if(isset($_FILES["image"]["name"])){
					$id = $_POST["id"];
					$name = $_POST["name"];

					$imageName = $_FILES["image"]["name"];
					$imageSize = $_FILES["image"]["size"];
					$tmpName = $_FILES["image"]["tmp_name"];

					 // Image validation
					$validImageExtension = ['jpg', 'jpeg', 'png'];
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));
					if (!in_array($imageExtension, $validImageExtension)){
						echo
								"
								<script>
								alert('Invalid Image Extension');
								document.location.href = '../updateimageprofile';
								</script>
								";
					}
					elseif ($imageSize > 1200000){
						echo
								"
								<script>
								alert('Image Size Is Too Large');
								document.location.href = '../updateimageprofile';
								</script>
								";
					}
					else{
						$newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
						$newImageName .= '.' . $imageExtension;
						$query = "UPDATE user SET image = '$newImageName' WHERE id = $id";
						mysqli_query($conn, $query);
						move_uploaded_file($tmpName, 'img/' . $newImageName); 
						}
				}
			?>
			<!--END PROFILE PIC-->
		</div>
	</header>
	
	<section>
	
		<!-- user info edit -->
		<form class="" action="" method="post" autocomplete="off">
			<table>
				<tr>
					<td><label for="username">Username </label></td>
					<td><label for="name">Name </label></td>
				</tr>
				<tr>
					<td><input type="text" name="username" id = "username" value="<?php echo $row['username'];?>" required></td>
					<td><input type="text" name="name" id = "name" value="<?php echo $row['name'];?>" required></td>
				</tr>
				<tr>
					<td><label for="email">Email</label></td>
					<td><label for="email">Contact Number</label></td>
				</tr>
				<tr>
					<td><input type="email" name="email" id = "email" value="<?php echo $row['email'];?>" required></td>
					<td><input type="text" name="contact" id = "contact" value="<?php echo $row['contact'];?>" required></td>
				</tr>
				<tr><td><a href="changepass.php" class="change_password">Change password</a></td></tr>
				<tr><td colspan='2' class="center"><button type="submit" class="save-btn" name="submit">Save Profile</button></td></tr>
			</table>
			
		</form>


		<?php
				if(isset($_POST["submit"])) {
					$username = $_POST['username'];
					$name = $_POST['name'];
					$email = $_POST['email'];
					$contact = $_POST['contact'];
					$query = "UPDATE user SET username = '$username' WHERE id = $id";
					mysqli_query($conn, $query);
					$query = "UPDATE user SET name = '$name' WHERE id = $id";
					mysqli_query($conn, $query);
					$query = "UPDATE user SET email = '$email' WHERE id = $id";
					mysqli_query($conn, $query);
					$query = "UPDATE user SET contact = '$contact' WHERE id = $id";
					mysqli_query($conn, $query);
					header("Location: editprofile.php");
				}
		?>
		
	</section>
	
	<footer>
			<h4>About Us</h4>
			<p class="about"> Shotz Inc. is an association of professional photographers. Shotz Website is an avenue for these professional photographers or contributors to share their works either for free or with payment. Potential customers, who need high-quality photos either for business, entertainment, or other purposes can have access with the works of our contributors. This website offers free or premium photos. Potential customers/users can get free photos without an account, together with its photo reference. Meanwhile, to get access with premium photos, potential customers must register/subscribe in the premium account. With the premium account, aside from getting access to all photos, they can also search for the profile/portfolio of our professional photographers and get a chance to hire them. All users and contributors should follow specific community rules, stated in the Terms and Conditions or License.</p>
			<div class="social-icons">
				<a href="https://twitter.com"><i class="fab fa-twitter fa-2x"></i></a>
				<a href="https://www.facebook.com"><i class="fab fa-facebook-f fa-2x"></i></a>
				<a href="https://www.linkedin.com"><i
						class="fab fa-linkedin-in fa-2x"></i></a>
				<a href="https://www.instagram.com"><i class="fab fa-instagram fa-2x"></i></a>
			</div>
			<div class="copyright">
				&copy; 2022. All rights reserved.
			</div>
			<div class="arrow-up">
				<a href="#body"><i class="fas fa-arrow-up"></i></a>
			</div>
	</footer>
	
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