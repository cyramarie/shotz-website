<?php
     define('DBINFO','mysql:host=localhost;dbname=image_gallery');
     define('DBUSER','root');
     define('DBPASS','');
 
     function performQuery($query){
         $con = new PDO(DBINFO,DBUSER,DBPASS);
         $stmt = $con->prepare($query);
         if($stmt->execute()){
             return true;
         }else{
             return false;
         }
     }
 
     function fetchAll($query){
         $con = new PDO(DBINFO, DBUSER, DBPASS);
         $stmt = $con->query($query);
         return $stmt->fetchAll();
     }

    $id = $_GET['id'];

    $id = $_GET['id'];
    
    $query = "DELETE FROM `request` WHERE `request`.`id` = '$id';";
        if(performQuery($query)){
            echo "Account has been rejected.";
            header("Location: manageRequest.php");
        }else{
            echo "Unknown error occured. Please try again.";
        }
    
?>