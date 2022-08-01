<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
	<title>Shotz | License</title>
    <link rel="stylesheet" href="licensestyle.css" type="text/css">
</head>
<body id="body" class="bg-light">
    <header>
        <nav>
            <a href="landpage.php">
                <img src="shotz_logo.png" alt="logo" class="logo">
			</a>
			<div class="nav-links">
				<ul>
                    <li><a href="landpage.php">Home</a></li>
                    <li><a href="loginusers.php">Login</a></li>
                    <li><a href="registration.php">Register</a></li>
					<li><i onclick="openNav()" class="fas fa-bars fa-2x menu"></i></li>
				</ul>
            </div>
        </nav>

        <div id="side-nav">
            <i onclick="closeNav()" class="fas fa-times fa-2x"></i>
            <a href="landpage.php">Home</a>
			<a href="loginusers.php">Log in</a>
            <a href="registration.php">Register</a>
        </div>
		
    </header>
	
	<section>
		<div class="content">
            <h1>LICENSE</h1>
            <h4>Downloading and using any of the Shotz' images is free.</h4>
			<h3>What can you do?</h3>
            <p>Shotz offers free usage of all of its images and videos.</p>
            <p>It is not necessary to attribute, but it is always appreciated, to give credit to the photographers.</p>
            <p>The Shotz images can be edited. Be imaginative while editing them.</p>
			<h3>What you can't do?</h3>
            <p>Never provide unmodified copies of a photo for sale as a poster, print, or on a tangible item without first editing it.</p>
            <p>No identifiable individuals should be portrayed negatively or offensively.</p>
            <p>Don't indicate on the photos that people or businesses are endorsing your goods.</p>
            <p>Don't share or market the images on other stock image websites.</p>
        </div>
	</section>
    
    <footer>
		<h4>About Us</h4>
		<p class="about">Shotz Inc. is an association of professional photographers. Shotz Website is an avenue for these professional photographers or contributors to share their works either for free or with payment. Potential customers, who need high-quality photos either for business, entertainment, or other purposes can have access with the works of our contributors. This website offers free or premium photos. Potential customers/users can get free photos without an account, together with its photo reference. Meanwhile, to get access with premium photos, potential customers must register/subscribe in the premium account. With the premium account, aside from getting access to all photos, they can also search for the profile/portfolio of our professional photographers and get a chance to hire them. All users and contributors should follow specific community rules, stated in the Terms and Conditions or License.</p>
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

</body>
</html>