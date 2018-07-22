<?php include('server.php') ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Project Signup</title>
      <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
      <title>Signup with Session</title>
   </head>
   <body class="text-center">
      <form class="form-signin" method="post" action="register.php">
         <h1 class="h3 mb-3 font-weight-normal">Signup with Session</h1>
         <?php include('errors.php'); ?>
         <label class="sr-only">Username</label>
         <input class="form-control" type="text" name="username" placeholder="Username" required autofocus>
         <label class="sr-only">Email</label>
         <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" placeholder="Email">
         <label class="sr-only">Password</label>
         <input class="form-control" type="password" name="inputPassword" placeholder="Password">
         <label class="sr-only">Confirm password</label>
         <input class="form-control" type="password" name="PasswordConfirm" placeholder="Confirm Password">
         <button type="submit" class="btn btn-lg btn-primary btn-block" name="reg_user">Signup</button>
         <p>
            Already a member? <a href="signin.php">Sign in</a>
         </p>
         <p class="mt-5 mb-3 text-muted">&copy; SMC CS85 Project 2018</p>
      </form>
   </body>
</html>
