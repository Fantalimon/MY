<?php
session_start();
include "config.php";

if (!empty($_POST)) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $created_at=date("Y-m-d H:i:s");
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    
    if (empty(getUsersByEmail($email))) {
        
        $userId = addUser($username,$email,$password,$created_at);
        if(empty($userId)){die('User has not been added!');}
        
        $password=md5($password);
        
        $user = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'created_at'=> $created_at,
            'user_id' => $userId
        ];
}
    
    $_SESSION['userdata'] = serialize($user);
    
    
    
    header('location: '.SITE);
}
?>
