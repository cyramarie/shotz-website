<?php

require_once 'config.php';

                $id = $_GET['id'];
                $active= "y";
                $date = date('Y-m-d H:i:s');
				$query = "UPDATE customer SET active = '$active' WHERE id = $id";
                $query1 = "UPDATE customer SET date = '$date' WHERE id = $id";
				mysqli_query($conn, $query);
                mysqli_query($conn, $query1);
				header("Location: manageUsers.php");
				
?>