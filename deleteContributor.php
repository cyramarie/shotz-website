<?php   
 include 'config.php';  
 if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `user` WHERE id = '$id'";  
      $query1 = "DELETE FROM `gallery` WHERE user_id = '$id'"; 
      $run = mysqli_query($conn,$query); 
      $run1 = mysqli_query($conn,$query1);
      if ($run) {  
           header('location:admin.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
      if ($run1) {  
          header('location:admin.php');  
     }else{  
          echo "Error: ".mysqli_error($conn);  
     }  
 }  
 ?>  