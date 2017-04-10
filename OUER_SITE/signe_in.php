<?php
session_start();
include "config.php";

if (!empty($_POST)) {
    $username_in = $_POST['username_in'];
    $email_in = $_POST['email_in'];
    $password_in = $_POST['password_in'];
    $created_at_in=date("Y-m-d H:i:s");
    $email_in = filter_var($email_in, FILTER_VALIDATE_EMAIL);
    
    $arr=signeInUser($username_in, $email_in, $password_in);
 if ($arr == true){
    $_SESSION['username'] = $arr['username'];
    header('location: '.SITE);
}
    header('location: '.SITE);
}
