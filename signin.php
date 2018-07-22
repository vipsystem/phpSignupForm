<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Project Signup</title>
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
    <title>Signup with Session</title>
</head>
<body class="text-center">
<form class="form-signin" method="post" action="signin.php">
    <h2>Login</h2>
    <?php include('errors.php'); ?>
    <input type="hidden" name="login_user" />
    <label class="sr-only">Username</label>
    <input class="form-control" type="text" name="username" placeholder="Username">
    <label class="sr-only">Password</label>
    <input class="form-control" type="password" name="password" placeholder="Password">
    <button type="submit" class="btn btn-lg btn-primary btn-block" name="login_user">Login</button>
    <p>
        Not yet a member? <a href="register.php">Sign up</a>
    </p>
    <p class="mt-5 mb-3 text-muted">&copy; SMC CS85 Project 2018</p>
</form>
</body>
</html>
