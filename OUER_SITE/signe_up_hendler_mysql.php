<?php
include_once 'config.php';
function getConnection($host=DB_HOST,$username=DB_USER,$password=DB_PASSWORD,$dbname=DB_NAME)
{
    static $link = null;
    
    if($link ===null){
    $link = mysqli_connect($host,$username,$password,$dbname);
    if (!$link) die ("connection is lost". mysqli_connect_error());
    mysqli_query($link, 'SET NAMES utf8');
    }
    return $link;
}


function closeConnection(mysqli $link)
{
    mysqli_close($link);
}

function getUsers()
{
    $link = getConnection();
    $query="select * from users ";
    $rezult = mysqli_query($link, $query);
    if(!$rezult) die('user is not exist'.mysqli_error($link));
    
    $users=[];
    while($row=mysqli_fetch_assoc($rezult))
    {
        $users[]= $row;
    }
    return $users;
}

function getUsersByEmail($email)
{
    $link = getConnection();
    $email= mysqli_real_escape_string($link, $email);
    $query="select * from users WHERE email = '$email'";
    $rezult = mysqli_query($link, $query);
    if(!$rezult) die('user is not exist'.mysqli_error($link));
    
   return mysqli_fetch_assoc($rezult);
}

function addUser($username,$email,$password,$created_at)
{
    $link=getConnection();
    $query='insert into users (`username`,`email`,`password`,`created_at`) VALUES (?,?,?,?)';
   $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, 'ssss', $username,$email,$password,$created_at);
    $rezult=mysqli_stmt_execute($stmt);
    if(!$rezult){die('Error: '.mysqli_stmt_error($stmt));}
    $userId=mysqli_stmt_insert_id($stmt);
    mysqli_stmt_close($stmt);
    return $userId;
}

session_start();
if (!empty($_POST)) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    
    if (empty(getUsersByEmail($email))) {
    
        $userId = addUser($username,$email,$password,$created_at);
        if(empty($userId)){die('User has not been added!');}
    
        $password=md5($password);
        $created_at=date("Y-m-d H:i:s");
        $user = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'created_at'=>$created_at,
            'user_id' => $userId
        ];
    
    
    
    }
    
    $_SESSION['userdata'] = serialize($user);
    header('location: '.SITE);
    
}
