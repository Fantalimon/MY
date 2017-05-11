<?php
include_once 'conf.php';
session_start();
if(!empty ($_POST)){
    $username = htmlspecialchars(trim(strip_tags($_POST['username'])));
    $email = htmlspecialchars(trim(strip_tags($_POST['email'])));
    $hompage = htmlspecialchars(trim(strip_tags($_POST['hompage'])));
    $captcha = htmlspecialchars(trim(strip_tags($_POST['captcha'])));
    $text = htmlspecialchars(trim(strip_tags($_POST['text'])));
    $created_at=date("Y-m-d H:i:s");
    $ip=$_SERVER['REMOTE_ADDR'];
    $brouser=$_SERVER['HTTP_USER_AGENT'];
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if($captcha!== $_SESSION['captcha'])
    {header('location: '.FORM);}
}


