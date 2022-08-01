<?php
   include 'config.php';  
   $query = "select * from request";  
   $run = mysqli_query($conn,$query);  

?>
<!doctype html>
<html lang="en">
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Shotz</title> 
      <link rel="stylesheet" type="text/css" href="removeContri.css">  
  </head>

  <body>

     <header>
          
          <nav>
               <a href="landpage.php">
                    <img src="shotz_logo.png" alt="logo" class="logo">
               </a>

               <div class="nav-links">
                    <ul>
                         <li><i onclick="openNav()" class="fas fa-bars fa-2x"></i></li>
                    </ul>
               </div>
          </nav>

          <div id="side-nav">
               <i onclick="closeNav()" class="fas fa-times fa-2x" style="color:white;"></i>
               <a href="admin.php">Home</a>
               <a href="addContributor.php">Register Contributors</a>
               <a href="removeContributor.php">Remove Contributors</a>
               <a href="manageRequest.php" class="active">Premium Account Requests</a>
               <a href="manageUsers.php">Manage Premium Account </a>
          </div>

          <div class="title"><h1>Manage Requests</h1></div>

     </header>


    <table cellspacing="0" cellpadding="0">  
      <tr class="heading">  
            <th>#</th>  
           <th>ID</th>  
           <th>Name</th> 
           <th>Userame</th> 
           <th>Email</th>  
           <th>Action</th> 
           <th>Action</th> 
         
      </tr>  
      <?php   
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) {  
                     echo "  
                          <tr class='data'>  
                          <td>".$i++."</td>  
                               <td>".$result['id']."</td>  
                               <td>".$result['name']."</td>
                               <td>".$result['username']."</td>  
                               <td>".$result['email']."</td>  
                               <td><a href='acceptRequest.php?id=".$result['id']."' id='btn'>Accept</a></td> 
                               <td><a href='rejectRequest.php?id=".$result['id']."' id='btn'>Delete</a></td>  
                          </tr>  
                     ";  
                }  
           }  
      ?>  
    </table>

     
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