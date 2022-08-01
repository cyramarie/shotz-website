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
    
	<title>Shotz | Admin</title>
    <link rel="stylesheet" href="monstyle.css" type="text/css">
</head>
<body id="body" class="bg-light">
    <header>
        <nav>
            <a href="logout.php">
                <img src="shotz_logo.png" alt="logo" class="logo">
			</a>
			 
			<div class="nav-links">
				<ul>
					<li><i onclick="openNav()" class="fas fa-bars fa-2x"></i></li>
				</ul>
            </div>
        </nav>

        <div id="side-nav">
            <i onclick="closeNav()" class="fas fa-times fa-2x"></i>
            <a href="admin.php" class="active" style="color:#FCA311;">Home</a>
            <a href="addContributor.php">Register Contributors</a>
            <a href="removeContributor.php">Remove Contributors</a>
            <a href="manageRequest.php">Premium Account Request</a>
            <a href="manageUsers.php">Premium Account</a>
            <a href="logout.php">Logout</a>
        </div>

        <div class="content">
            <h2>WELCOME TO SHOTZ ADMIN</h2>
            <p>Manage Shotz website</p>
            
            
        </div>
        
    </header>
	
	<section class="row" id="row"></section>

	<!--- Display Full Image Preview Start---->
    <div class="modal fade" id="image_preview_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="image_alt_text"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
				
                    <img class="img-fluid" id="set_image"/>

					<div class="mt-2 float-end">
					                
					<a href="#" id="set_dl">	
						<button class="btn btn-primary rounded-5"> Free download </button>
					</a>
					</div>
                </div>
            </div>
        </div>
    </div>  
	<!--- Display Full Image Preview End---->
    <footer>

		<h4>About Us</h4>
		<p class="about"> Shotz Inc. is an association of professional photographers. Shotz Website is an avenue for these professional photographers or contributors to share their works either for free or with payment. Potential customers, who need high-quality photos either for business, entertainment, or other purposes can have access with the works of our contributors. This website offers free or premium photos. Potential customers/users can get free photos without an account, together with its photo reference. Meanwhile, to get access with premium photos, potential customers must register/subscribe in the premium account. With the premium account, aside from getting access to all photos, they can also search for the profile/portfolio of our professional photographers and get a chance to hire them. All users and contributors should follow specific community rules, stated in the Terms and Conditions or License. </p>
        <div class="social-icons">
            <a href="https://twitter.com"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="https://www.facebook.com"><i class="fab fa-facebook-f fa-2x"></i></a>
            <a href="https://www.linkedin.com"><i
                    class="fab fa-linkedin-in fa-2x"></i></a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram fa-2x"></i></a>
        </div>
        <br>

        <div class="copyright">
            &copy; 2022. All rights reserved.
        </div>
        <div class="arrow-up">
            <a href="#body"><i class="fas fa-arrow-up"></i></a>
        </div>
    </footer>

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
	<script src="temp.js"></script>
</body>
</html>