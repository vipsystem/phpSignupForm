<?php

error_reporting(E_ALL);
session_start();

$username            = "";
$email               = "";
$errors              = array();
$_SESSION['success'] = "";

$Database = mysqli_connect('localhost', 'kaustin', 'iTkz3DREih', 'kaustin_project') or die(mysqli_error());

 if(isset($_GET['create_table'])) {

// query the database
     $result = mysqli_query($Database, 'DROP TABLE IF EXISTS users') or die(mysqli_error());

//create another query
     $query = 'CREATE TABLE users (id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, username varchar(100) NOT NULL, email varchar(100) NOT NULL, password varchar(100) NOT NULL)';

// send the query
     $result = mysqli_query($Database, $query) or die(mysqli_error());

 }


if (isset($_POST['reg_user'])) {

    $username = mysqli_real_escape_string($Database, $_POST['username']);
    $email = mysqli_real_escape_string($Database, $_POST['email']);
    $inputPassword = mysqli_real_escape_string($Database, $_POST['inputPassword']);
    $PasswordConfirm = mysqli_real_escape_string($Database, $_POST['PasswordConfirm']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    $sql_users = "SELECT * FROM users where username like '" . $username . "'";

    if ($result_users = mysqli_query($Database, $sql_users))

        $rowcount = mysqli_num_rows($result_users);

    if($rowcount > 0) {

        array_push($errors, "User exists");
    }

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid Email Format");
    }
    if (strlen($inputPassword) < 5) {
        array_push($errors, "Password min. 5 chars");
    }
    if (empty($inputPassword)) {
        array_push($errors, "Password is required");
    }

    if ($inputPassword != $PasswordConfirm) {
        array_push($errors, "The two passwords do not match");
    }

    if (count($errors) == 0) {
        $password = md5($inputPassword);
        $query    = "INSERT INTO users (username, email, password) 
            VALUES('$username', '$email', '$password')";
        mysqli_query($Database, $query);

        $_SESSION['username'] = $username;
        $_SESSION['success']  = "You are now logged in";
        header('location: index.php');
    }

}

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($Database, $_POST['username']);
    $inputPassword = mysqli_real_escape_string($Database, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($inputPassword)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $inputPassword = md5($inputPassword);
        $query    = "SELECT * FROM users WHERE username='$username' AND password='$inputPassword'";
        $results  = mysqli_query($Database, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success']  = "You are now logged in";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

?>
