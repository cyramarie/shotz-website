<?php
    require_once 'config.php';
    if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM customer WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Shotz | <?php echo $row["name"]; ?></title>
    <link rel="stylesheet" href="monstyle.css" type="text/css">
</head>

<body id="body" class="bg-light">
    <header>
        <nav>
            <a href="landpage2.php">
                <img src="shotz_logo.png" alt="logo" class="logo">
			</a>
			<div class="nav-links">
				<ul>
                    <li><a><?php echo $row["name"]; ?> |</a></li>
                    <li><a href="landpage2.php" class="active">Home</a></li>
                    <li><a href="#row">Photos</a></li>
                    <li><a href="logout.php">Logout</a></li>
					<li><i onclick="openNav()" class="fas fa-bars fa-2x menu"></i></li>
				</ul>
            </div>
        </nav>

        <div id="side-nav">
            <i onclick="closeNav()" class="fas fa-times fa-2x"></i>
            <a><?php echo $row["name"]; ?></a>
            <a href="landpage.php" class="active">Home</a>
            <a href="#row">Photos</a>
            <a href="logout.php">Log out</a>
        </div>

        <div class="content">
            <h3>Welcome to Shotz</h3>
        </div>

        <?php
        if(isset($_POST["submit"])){
            $searchUser = $_POST["search-bar"];
            $result1 = mysqli_query($conn, "SELECT * FROM user WHERE username = '$searchUser' OR name = '$searchUser'");
            $rows = mysqli_fetch_assoc($result1);
            if(mysqli_num_rows($result1) > 0){ 
                
                $_SESSION["otherid"] = $rows["id"];
                header("Location: index2.php");
              }
              else{
                    echo
                    "<script> alert('USER CANNOT BE FOUND'); </script>";  
              }
              
            }
        ?>
        <div class="search">
            <form  method="post">
                <input type="text" id="search-bar" name="search-bar" placeholder="Search Contributors"/>
                <a href="#" class="search-img">
				    <i class="fas fa-search fa-2x search-img"></i>
			    </a>
                <button type="submit" id="submit" class="search-user" name="submit"><i class="fas fa-user fa-2x user-icon"></i></button>
            </form>
        </div>
    </header>
	
	<section class="row" id="row"></section>

	<!--- Display Full Image Preview Start---->
    <div class="modal fade" id="image_preview_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="color:white;">
                    <h5 class="modal-title" id="image_alt_text"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
				
                    <img class="img-fluid rounded mx-auto d-block" id="set_image"/>

					<div class="d-flex justify-content-center btn-dl">     
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