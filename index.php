<?php
   session_start();
   
   if (!isset($_SESSION['username'])) {
       $_SESSION['msg'] = "You must log in first";
       header('location: signin.php');
   }
   
   if (isset($_GET['logout'])) {
       session_destroy();
       unset($_SESSION['username']);
       header("location: signin.php");
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Member Confirmed Login Page</title>
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <body class="text-center">
      <h2>Member Confirmed Login Page</h2>
      <img src="https://vignette.wikia.nocookie.net/central/images/f/f2/Kitten_GIF.gif/revision/latest?cb=20171231225749">
      <div class="content">
         <!-- notification message -->
         <?php if (isset($_SESSION['success'])) : ?>
         <div class="error success" >
            <h3>
               <?php
                  echo $_SESSION['success'];
                  unset($_SESSION['success']);
                  ?>
            </h3>
         </div>
         <?php endif ?>
         <!-- logged in user information -->
         <?php  if (isset($_SESSION['username'])) : ?>
         <p>
         <h3>Welcome: <strong><?php echo $_SESSION['username']; ?></strong></h3>
         </p>
         <p> <a href="index.php?logout='1'" style="color:#e31b1b;">logout</a> </p>
         <?php endif ?>
      </div>
   </body>
</html>
