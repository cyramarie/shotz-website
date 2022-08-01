<?php
//handle ajax image request

require_once 'Util.php';
$util = new Util;
require_once 'database.php';
$db = new Database;

//SESSION CURRENT USER
require_once 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $rows = mysqli_fetch_assoc($result);
}
if(!empty($_SESSION["otherid"])){
    $otherid = $_SESSION["otherid"];
    $result1 = mysqli_query($conn, "SELECT * FROM user WHERE id = $otherid");
    $row1 = mysqli_fetch_assoc($result1);
    
  }
else{
  header("Location: login.php");
}
//UPLOAD IMAGE ajax request
if(isset($_POST['image_upload'])){

    $alt_text = $util->testInput($_POST['altText']);
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $image_ext = explode('.', $image_name);
    $image_ext = strtolower(end($image_ext));

    $allowed_ext = ['jpg', 'jpeg', 'png'];

    $target_dir = 'uploads/';
    $image_unique_name = uniqid() . '.' . $image_ext;
    $image_path = $target_dir . $image_unique_name;
    $userID = $rows["id"];
    $seen = $util->testInput($_POST['seen']);


    if(!file_exists($image_path)){
        if(in_array($image_ext,$allowed_ext)){
            if($image_size <= 1000000){
                if(move_uploaded_file($image_tmp, $image_path)){
                    $db->uploadImage($alt_text, $image_unique_name, $userID, $seen);
                    echo $util->showMessage('success', 'Image Added Successfully!');
                }
            }
            else{
                echo $util->showMessage('danger', 'Image size should be less than or equal to 1MB');
            }

        }else{
            echo $util->showMessage('danger', 'Unsupported Image Type!');
        }
    }else{
        echo $util->showMessage('danger', 'Image already exists in the database!');
    }
}

//handle FETCH ALL IMAGES ajax request
if(isset($_POST['fetch_all_images'])){
    $userID = $rows["id"];
    $images = $db->fetchAllImages($userID);
    $output = '';

    if($images){
        foreach($images as $row){
            $output .= '<div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="#" class="open_image" id="'.$row['id'].'"
                            data-bs-toggle="modal" data-bs-target="#image_preview_modal">
                                <img src="uploads/'.$row['image_path'].'" alt="'.$row['alt_text'].'"
                                class="img-fluid rounded-0 img-thumbnail">
                            </a>
                        </div>';
        }
        echo $output;
    }
    else{
        echo '<div class="col-lg-12">
                    <h1 class="text-center p-4">Start Journey by Adding Images to the Gallery!</h1>
                </div>';
    }
}

//handle FETCH ALL IMAGES of other user ajax request
if(isset($_POST['fetch_all_images1'])){
    $userID = $row1["id"];
    $images1 = $db->fetchAllImages1($userID);
    $output1 = '';

    if($images1){
        foreach($images1 as $rowt){
            $output1 .= '<div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="#" class="open_image" id="'.$rowt['id'].'"
                            data-bs-toggle="modal" data-bs-target="#image_preview_modal">
                                <img src="uploads/'.$rowt['image_path'].'" alt="'.$rowt['alt_text'].'"
                                class="img-fluid rounded-0 img-thumbnail">
                            </a>
                        </div>';
        }
        echo $output1;
    }
    else{
        echo '<div class="col-lg-12">
                    <h1 class="text-center p-4">Start Journey by Adding Images to the Gallery!</h1>
                </div>';
    }
}

//handle set image modal image FULL VIEW
if(isset($_POST['image_id'])){
    $id = $_POST['image_id'];
    $image = $db->fetchImage($id);
    echo json_encode($image);
}

//handle EDIT IMAGE ajax request

if(isset($_POST['edit_image'])){
    $id = $_POST['id'];
    $image = $db->fetchImage($id);
    echo json_encode($image);
}

//handle UPDATE ajax request
if(isset($_POST['update_image_upload'])){
    $image_id = $_POST['edit_image_id'];
    $alt_text = $util->testInput($_POST['altText']);
    $old_image = $_POST['old_image'];

    
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $image_ext = explode('.', $image_name);
    $image_ext = strtolower(end($image_ext));

    $target_dir = "uploads/";
    $image_unique_name = uniqid() . '.' .$image_ext;
    $image_path = $target_dir . $image_unique_name;

    if(isset($image_name) && $image_name != ''){
        $new_image_path = $image_unique_name;
        move_uploaded_file($image_tmp, $image_path);
        if($old_image != null){
            unlink($target_dir . $old_image);
        }
    }else{
        $new_image_path = $old_image;
    }

    if($db->updateImage($image_id, $alt_text, $new_image_path)){
        echo $util->showMessage('success', 'Image Updated Successfully!');
    }else{
        echo $util->showMessage('danger', 'Something went wrong!');
    }

}


//handle REMOVE IMAGE ajax request

if(isset($_POST['remove_image'])){

    $id = $_POST['id'];
    $img_url =  $_POST['img_url'];

    if($db->removeImage($id)){
        unlink($img_url);
        echo $util->showMessage('success', 'Image deleted successfully!');
    }else{
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}

?>
