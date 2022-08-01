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
    <title>Shotz | <?php echo $row["name"]; ?> </title>
    <link rel="stylesheet" href="profilestyle.css" type="text/css">
</head>
<body class="bg-light" id="body">

     
<!--- Modal for UPLOAD starts---->
        <div class="modal fade" id="upload_image_modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Image To Your Gallery</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">

                            <div id="message_alert"></div>

                            <div class="progress mb-3" style="height: 25px; display: none;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        <form action="#" method="POST" enctype="multipart/form-data" id="image_upload_form">
                            <div class="mb-3">
                                <input type="text" name="altText" id="alt_text" class="form-control" placeholder="Image Description" required/>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="image" id="image_upload" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <input type="radio" name="seen" id="seen" value="Public"/> Public
                                <input type="radio" name="seen" id="seen"value="Premium"/> Premium

                            </div>    
                            <div class="mb-3" id="preview_image">
                                
                            </div>
                            <div class="mb-3 d-grid">
                                <input type="submit" value="Add" class="btn btn-primary" id="upload_btn"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
<!--- Modal for UPLOAD ends---->

<!--- CHANGE IMAGE modal starts---->
        <div class="modal fade" id="edit_image_modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">

                            <div id="edit_message_alert"></div>

                            <div class="progress mb-3" style="height: 25px; display: none;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        <form action="#" method="POST" enctype="multipart/form-data" id="image_edit_form">

                            <input type="hidden" name="edit_image_id" id="edit_image_id">
                            <input type="hidden" name="old_image" id="old_image">

                            <div class="mb-3">
                                <input type="text" name="altText" id="edit_alt_text" class="form-control" placeholder="Image Description" required/>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="image" id="edit_image_upload" class="form-control" />
                            </div>
                            <div class="mb-3" id="edit_preview_image">
                                
                            </div>
                            <div class="mb-3 d-grid">
                                <input type="submit" value="Update" class="btn btn-success" id="change_btn"/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>    
<!--- CHANGE IMAGE modal ends---->

<!--- Display Full Image Preview Start---->

    <div class="modal fade" id="image_preview_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#" class="text-primary me-2 change_image" title="Change Image" data-bs-toggle="modal" data-bs-target="#edit_image_modal">
                        <i class="fas fa-edit fa-lg" style="color: black;"></i>
                    </a>
                    <a href="#" class="text-danger me-2 remove_image" title="Remove Image">
                        <i class="fas fa-trash-alt fa-lg" style="color: black;"></i>
                    </a>
                    <h5 class="modal-title" id="image_alt_text"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid rounded mx-auto d-block" id="set_image"/>
                </div>
            </div>
        </div>
    </div>  
<!--- Display Full Image Preview End---->

 
<!--Navigation start-->
<header>
        <nav>
            <a>
                <img src="shotz_logo.png" alt="logo" class="logo">
			</a>
			<div class="nav-links">
				<ul>
                    <li><a><?php echo $row["name"]; ?> | </a></li>
                    <li><a href="index.php" class="active">Upload</a></li>
                    <li><a href="editprofile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
					<li><i onclick="openNav()" class="fas fa-bars fa-2x menu"></i></li>
				</ul>
            </div>
        </nav>

        <div id="side-nav">
            <i onclick="closeNav()" class="fas fa-times fa-2x"></i>
			<a><?php echo $row["name"]; ?></a>
			<a href="index.php" class="active">Upload</a>
			<a href="editprofile.php">Profile</a>
            <a href="logout.php">Log out</a> 
        </div>

    <div class="content">

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

        <script type="text/javascript">
            document.getElementById("image").onchange = function(){
             document.getElementById("form").submit();
            };
        </script>

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
            <h1><?php echo $row["name"]; ?> </h1>
    </div>
    
    <div class="row mt-4">
            <div class="text-center">

                <button class="btn btn-primary rounded-5" data-bs-toggle="modal" data-bs-target="#upload_image_modal">
                    Upload Photo
                </button>
 
            </div>
    </div>

        
</header>
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
<!--Navigation end-->

        <hr/> <!--for horizontal line-->
        <div id="delete_image_alert"></div> <!--alert will display when an image is deleted-->
            
            <div class="row g-4" id="show_all_images">
           
                <h1 class="text-center text-secondary p-5">Loading Please Wait...</h1>
            </div>
        </div>
    

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
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="main.js"></script>
	</body>
</html>