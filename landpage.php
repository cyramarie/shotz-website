<?php
require_once 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
  header("Location: landpage2.php");
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
    
	<title>Shotz | Free Stock Photos</title>
    <link rel="stylesheet" href="monstyle.css" type="text/css">
</head>
<body id="body" class="bg-light">
    <header>
        <nav>
            <a href="landpage.php">
                <img src="shotz_logo.png" alt="logo" class="logo">
			</a>
			<div class="nav-links">
				<ul>
                    <li><a href="landpage.php" class="active">Home</a></li>
                    <li><a href="#row">Photos</a></li>
                    <li><a href="loginusers.php">Login</a></li>
                    <li><a href="registration.php">Register</a></li>
                    <li><a href="license.php">License</a></li>
					<li><i onclick="openNav()" class="fas fa-bars fa-2x menu"></i></li>
				</ul>
            </div>
        </nav>

        <div id="side-nav">
            <i onclick="closeNav()" class="fas fa-times fa-2x"></i>
            <a href="landpage.php" class="active">Home</a>
            <a href="#row">Photos</a>
			<a href="loginusers.php">Log in</a>
            <a href="registration.php">Register</a>
			<a href="license.php">License</a>
            
        </div>

        <div class="content">
            <h2>Free high quality stock images shared by our talented creators.</h2>
        </div>

        <div class="search">
            <input type="text" placeholder="Search Images" id="search_bar"/>
			<a href="#" class="search_img">
				<i class="fas fa-search fa-2x"></i>
			</a>
        </div>
    </header>
	
	<section class="row" id="row"></section>


<!--- Check if contributor---->
    <div class="modal fade" id="valid">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" value="ONLY VALID FOR CONTRIBUTORS"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password for Contributors" required/>
                    </div>
                    <div class="mb-3 d-grid">
                        <button onclick="checkPass();">Submit</button>
                    </div>
                    <div id="message"></div>
                </div>
            </div>
        </div>
    </div>  

    <script>
        function checkPass(){

        var n1 = document.getElementById('pass').value;
        var n2 = "shotz2022";
        var result = n1.localeCompare(n2);

        if(result == 0){
            window.location.href="login.php";
        }
        else{
             document.getElementById("message").innerHTML = "Invalid Password!";
             document.getElementById("pass").innerHTML ='';
        }
}
    </script>
<!--- Check if contributor End---->


 <!--- Check if admin
       <div class="modal fade" id="admin">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" value="ONLY VALID FOR ADMIN"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
				

                            <div class="mb-3">
                                <input type="password" name="pass1" id="pass1" class="form-control" placeholder="Enter Password for Admin" required/>
                            </div>
                            <div class="mb-3 d-grid">
                                <button onclick="checkPass1();">Submit</button>
                            </div>
                            <div id="message1"></div>

                            
                </div>
            </div>
        </div>
    </div>  

    <script>
        function checkPass1(){
            let n1 = document.getElementById('pass1').value;
            let n2 = "bscs33";
            let result = n1.localeCompare(n2);

            if(result == 0) {
                window.location.href="admin.php";
            }
            else{
                document.getElementById("message1").innerHTML = "Invalid Password!";
                document.getElementById("pass1").innerHTML = '';
            }
        }
    </script>
 Check if admin End
---->

	<!--- Display Full Image Preview Start---->
    <div class="modal fade" id="image_preview_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="color:white;">
                    <h5 class="modal-title" id="image_alt_text"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
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
 <!--admin button
        <br><br>
       
        <br><br>
        <button class="btn btn-danger rounded-5" data-bs-toggle="modal" data-bs-target="#admin">
                    Admin
        </button>
        <br><br> -->
        <div class="about">

        
            <h4>About Us</h4>
		    <p class="about"> Shotz Inc. is an association of professional photographers. Shotz Website is an avenue for these professional photographers or contributors to share their works either for free or with payment. Potential customers, who need high-quality photos either for business, entertainment, or other purposes can have access with the works of our contributors. This website offers free or premium photos. Potential customers/users can get free photos without an account, together with its photo reference. Meanwhile, to get access with premium photos, potential customers must register/subscribe in the premium account. With the premium account, aside from getting access to all photos, they can also search for the profile/portfolio of our professional photographers and get a chance to hire them. All users and contributors should follow specific community rules, stated in the Terms and Conditions or License. </p>
        </div>

        <div class="contributor">
            <button class="btn btn-light rounded-5 btn-cont" data-bs-toggle="modal" data-bs-target="#valid">
                    Contributors
            </button>
        </div>

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
		
    </script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="temp1.js"></script>
</body>
</html>