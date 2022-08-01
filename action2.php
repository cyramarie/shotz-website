<?php
	//handle ajax image request
	
	require_once 'Util.php';
	$util = new Util;
	require_once 'database.php';
	$db = new Database;
	
	//handle FETCH ALL FREE IMAGES ajax request
	if(isset($_POST['fetch_all_images_public'])){
		$seen = "Public";
		$images = $db->fetchAllImagesPublic($seen);;
		$output = '';
		$count = 0;
		
		/*
		$col1 = array();
		$col2 = array();
		$col3 = array();
		$col4 = array();*/
		
		$col = array (
			array(),
			array(),
			array(),
			array(),
		);

		// Sort images for every column
		if($images){
			foreach($images as $row){
				/*$output .= '<div class="col-sm-6 col-md-4 col-lg-3">
								<a href="#" class="open_image" id="'.$row['id'].'"
								data-bs-toggle="modal" data-bs-target="#image_preview_modal">
									<img src="uploads/'.$row['image_path'].'" alt="'.$row['alt_text'].'"
									class="img-fluid rounded-0 img-thumbnail">
								</a>
							</div>';*/
				if($count == 0) {
					array_push($col[0], $row);
					$count = 1;
				} else if($count == 1) {
					array_push($col[1], $row);
					$count = 2;
				} else if($count == 2) {
					array_push($col[2], $row);
					$count = 3;
				} else {
					array_push($col[3], $row);
					$count = 0;
				}
				/*$output .= '<div class="img-wrapper">
							<img src="uploads/'.$row['image_path'].'" alt="'.$row['alt_text'].'">
							<div class="overlay">
								<div class="user">
									<i class="fas fa-user-circle"></i>
									<h5>Kirankumar</h5>
								</div>
								<div class="icon">
									<i class="fas fa-arrow-down"></i>
								</div>
								<div class="icon">
									<i class="fas fa-heart"></i>
								</div>
							</div>
						</div>';		*/
			}
			//print_r($col);
			
			for ($row = 0; $row < 4; $row++) {
				$output = '';
				
				echo '<div class="column">';
				foreach($col[$row] as $photo) {
					//print_r($path);
					$user = $db->fetchUser($photo['user_id']);
					//print_r($user);
					$output .= '<div class="img-wrapper">
									<a href="#" class="open_image" id="'.$photo['id'].'"
									data-bs-toggle="modal" data-bs-target="#image_preview_modal">
										<img src="uploads/'.$photo['image_path'].'" alt='.$photo['alt_text'].' class="thumbnail">
									</a>
									<div class="overlay">
										<div class="user">
											<h7> '.$user['username']. '.('. date("Y") . ').' .$photo['alt_text']. '.Shotz.com' . '</h7>
										</div>
										<div class="icon">
												<a href="uploads/'.$photo['image_path'].'" download='.$photo['alt_text'].'>
												  <i class="fas fa-arrow-down"></i>
												</a>
										</div>
									</div>
								</div>';	
				}
				echo $output;
				echo '</div>';
			}
			/*
			echo '<div class="column">';
			foreach($col[0] as $row) {
				$output .= '<div class="img-wrapper">
								<img src="uploads/'.$row.'" alt="img">
								<div class="overlay">
									<div class="user">
										<i class="fas fa-user-circle"></i>
										<h5>Kirankumar</h5>
									</div>
									<div class="icon">
										<i class="fas fa-arrow-down"></i>
									</div>
									<div class="icon">
										<i class="fas fa-heart"></i>
									</div>
								</div>
							</div>';	
			}
			echo $output;
			echo '</div>';
			$output = '';
			
			echo '<div class="column">';
			foreach($col[1] as $row) {
				$output .= '<div class="img-wrapper">
								<img src="uploads/'.$row.'" alt="img">
								<div class="overlay">
									<div class="user">
										<i class="fas fa-user-circle"></i>
										<h5>Kirankumar</h5>
									</div>
									<div class="icon">
										<i class="fas fa-arrow-down"></i>
									</div>
									<div class="icon">
										<i class="fas fa-heart"></i>
									</div>
								</div>
							</div>';	
			}
			echo $output;
			echo '</div>';
			$output = '';
			
			echo '<div class="column">';
			foreach($col[2] as $row) {
				$output .= '<div class="img-wrapper">
								<img src="uploads/'.$row.'" alt="img">
								<div class="overlay">
									<div class="user">
										<i class="fas fa-user-circle"></i>
										<h5>Kirankumar</h5>
									</div>
									<div class="icon">
										<i class="fas fa-arrow-down"></i>
									</div>
									<div class="icon">
										<i class="fas fa-heart"></i>
									</div>
								</div>
							</div>';	
			}
			echo $output;
			echo '</div>';
			$output = '';
			
			echo '<div class="column">';
			foreach($col[3] as $row) {
				$output .= '<div class="img-wrapper">
								<img src="uploads/'.$row.'" alt="img">
								<div class="overlay">
									<div class="user">
										<i class="fas fa-user-circle"></i>
										<h5>Kirankumar</h5>
									</div>
									<div class="icon">
										<i class="fas fa-arrow-down"></i>
									</div>
									<div class="icon">
										<i class="fas fa-heart"></i>
									</div>
								</div>
							</div>';	
			}
			echo $output;
			echo '</div>';
			$output = ''; */
			//echo $output;
		}
		else{
			echo '<div class="col-lg-12">
						<h1 class="text-center p-4">Start Journey by Joining to the Gallery Community!</h1>
					</div>';
		}
	}


		//handle FETCH ALL IMAGES ajax request
		if(isset($_POST['fetch_all_images'])){
			$images = $db->fetchAllOfImages();
			$output = '';
			$count = 0;
			
			/*
			$col1 = array();
			$col2 = array();
			$col3 = array();
			$col4 = array();*/
			
			$col = array (
				array(),
				array(),
				array(),
				array(),
			);
	
			// Sort images for every column
			if($images){
				foreach($images as $row){

					if($count == 0) {
						array_push($col[0], $row);
						$count = 1;
					} else if($count == 1) {
						array_push($col[1], $row);
						$count = 2;
					} else if($count == 2) {
						array_push($col[2], $row);
						$count = 3;
					} else {
						array_push($col[3], $row);
						$count = 0;
					}
				}
				
				
				for ($row = 0; $row < 4; $row++) {
					$output = '';
					
					echo '<div class="column">';
					foreach($col[$row] as $photo) {
						
						$user = $db->fetchUser($photo['user_id']);
						
						$output .= '<div class="img-wrapper">
										<a href="#" class="open_image" id="'.$photo['id'].'"
										data-bs-toggle="modal" data-bs-target="#image_preview_modal">
											<img src="uploads/'.$photo['image_path'].'" alt='.$photo['alt_text'].' class="thumbnail">
										</a>

										<div class="overlay">
											<div class="user">
												<i class="fas fa-user-circle"></i>
												<h5>'.$user['username'].'</h5>
											</div>
											<div class="icon">
													<a href="uploads/'.$photo['image_path'].'" download='.$photo['alt_text'].'>
													  <i class="fas fa-arrow-down"></i>
													</a>
											</div>
										</div>
									</div>';	
					}
					echo $output;
					echo '</div>';
				}
				
			}
			else{
				echo '<div class="col-lg-12">
							<h1 class="text-center p-4">Start Journey by Joining to the Gallery Community!</h1>
						</div>';
			}
		}
	
	//handle set image modal image FULL VIEW
	if(isset($_POST['image_id'])){
		$id = $_POST['image_id'];
		$image = $db->fetchImage($id);
		echo json_encode($image);
	}
	
	
	//handle search image
	if(isset($_POST['search_img'])){
		$img = $_POST['search_img'];
		$images = $db->fetchSearchImages($img);
		//echo json_encode($images);
		$output = '';
		$count = 0;
		
		$col = array (
			array(),
			array(),
			array(),
			array(),
		);
		if($images){
			foreach($images as $row){
				if($count == 0) {
					array_push($col[0], $row);
					$count = 1;
				} else if($count == 1) {
					array_push($col[1], $row);
					$count = 2;
				} else if($count == 2) {
					array_push($col[2], $row);
					$count = 3;
				} else {
					array_push($col[3], $row);
					$count = 0;
				}
			}
			for ($row = 0; $row < 4; $row++) {
				$output = '';
				
				echo '<div class="column">';
				foreach($col[$row] as $photo) {
					
					$user = $db->fetchUser($photo['user_id']);
					$output .= '<div class="img-wrapper">
									<a href="#" class="open_image" id="'.$photo['id'].'"
									data-bs-toggle="modal" data-bs-target="#image_preview_modal">
										<img src="uploads/'.$photo['image_path'].'" alt='.$photo['alt_text'].' class="thumbnail">
									</a>
									<div class="overlay">
										<div class="user">
											<i class="fas fa-user-circle"></i>
											<h5>'.$user['username'].'</h5>
										</div>
										<div class="icon">
												<a href="uploads/'.$photo['image_path'].'" download='.$photo['alt_text'].'>
												  <i class="fas fa-arrow-down"></i>
												</a>
										</div>
									</div>
								</div>';	
				}
				echo $output;
				echo '</div>';
			}
		}
		else{
			echo '<div class="col-lg-12">
						<h1 class="text-center p-4">Your search did not match any stock photos.</h1>
					</div>';
		}
		
	}

	require_once 'config.php';
	$conn = mysqli_connect("localhost", "root", "", "image_gallery");

	if(isset($_POST['search'])){
		$name = $_POST['search'];
		$sql = "SELECT * FROM users WHERE name LIKE 'name%'";
		$result = mysqli_query($conn, $sql);
		$num = mysqli_num_rows($result);

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$data[] = array('id'=> $row['id'], 'name'=>$row['name']);
			}
		}
		echo json_encode($data);
	}







	




?>