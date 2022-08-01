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
    $query = "select * from `request` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $name = $row['name'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $contact = $row['contact'];
            $date = date('Y-m-d H:i:s');
            $active = "y";
            $query = "INSERT INTO `customer` (`id`, `name`, `username`, `email`, `password`, `contact`, `date`, `active`) VALUES (NULL, '$name', '$username', '$email', '$password', '$contact', '$date', '$active');";
        }
        $query .= "DELETE FROM `request` WHERE `request`.`id` = '$id';";
        if(performQuery($query)){
            echo "Account has been accepted.";
            header("Location: manageRequest.php");
        
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>