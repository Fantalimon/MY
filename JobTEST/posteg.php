<?php
include_once 'conf.php';
include_once 'posteg.php';
session_start();
$hompage='';
$ip='';
$brouser='';
$created_at='';
$text='';
if(!empty ($_POST)){
    $username = htmlspecialchars(trim(strip_tags($_POST['username'])));
    $username=(string)$username;
    $email = htmlspecialchars(trim(strip_tags($_POST['email'])));
    $email=(string)$email;
    $hompage = htmlspecialchars(trim(strip_tags($_POST['hompage'])));
    $hompage=(string)$hompage;
    $captcha = htmlspecialchars(trim(strip_tags($_POST['captcha'])));
    $text = htmlspecialchars(trim(strip_tags($_POST['text'])));
    $text=(string)$text;
    $created_at=date("Y-m-d H:i:s");
    $ip=$_SERVER['REMOTE_ADDR'];
    $brouser=$_SERVER['HTTP_USER_AGENT'];
    $brouser=(string)$brouser;
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if($captcha!== $_SESSION['captcha'])
    {header('location: '.FORM);}
}
addmassege($username, $email, $hompage,$text,$ip, $brouser, $created_at);

