<?php
session_start();

//intializing variables
$fullname = "";
$username = "";
$email = "";
$password = "";

$db = mysqli_connect('localhost','root',' ', 'teachnlearn');

if(isset($_POST['reg_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    $user_check_query = "SELECT * FROM user where username='$username' or email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    $password_1 = md5($password);

    $query = "INSERT INTO user (fullName, username, email, password) VALUES ('$fullname, '$username', '$email', '$password_1')";
    mysqli_query($db,$query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "you are now logged in";
    header('location: index.html');
}