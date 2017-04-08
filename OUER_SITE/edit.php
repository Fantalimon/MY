<?php
include "config.php";
if(!empty($_POST)){
   $username =  trim(strip_tags($_POST['username']));
   $email = trim(strip_tags($_POST['email']));
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $password =  trim(strip_tags($_POST['password']));
    $created_at=date("Y-m-d H:i:s");
    $id=trim(strip_tags($_POST['id']));
    
    $link=getConnection();
    
    readdUser($username,$email,$password,$created_at,$id);
    
    closeConnection($link);

}


