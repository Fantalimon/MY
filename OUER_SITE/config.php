<?php
$config=parse_ini_file('config.ini',true);

define('SITE',$config['domain']);
define('LOCATION', $config['location']);
define('REGISTRATION', $config['registration']);
define('allUsers', $config['allUsers']);

$configDb=$config['db'];
define('DB_HOST', $configDb['host']);
define('DB_USER', $configDb['user']);
define('DB_PASSWORD', $configDb['password']);
define('DB_NAME', $configDb['dbname']);
define('DB_PORT', $configDb['port']);


function getConnection($host=DB_HOST,$username=DB_USER,$password=DB_PASSWORD,$db_name=DB_NAME,$port=DB_PORT)
{
    static $link=null;
    if($link === null)
    {
        $link=mysqli_connect($host,$username,$password,$db_name,$port);
        if(!$link) die('Нет соединения с базой'.mysqli_connect_error());
        mysqli_query($link, 'SET NAMES utf8');
    }
    return $link;
}

function closeConnection(mysqli $link){mysqli_close($link);}


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

function readdUser($username,$email,$password,$created_at,$user_id)
{
    $link=getConnection();
    $query="update users set username= '$username', email='$email', password='$password', created_at='$created_at' WHERE user_id='$user_id'";
      $rezult = mysqli_query($link, $query);
      if(!$rezult){die('error : '.mysqli_error($link));}
    closeConnection($link);
      return $rezult;
}


function delUser($user_id)
{
 
    $link=getConnection();
    $query="delete from users WHERE user_id='$user_id'";
      $rezult = mysqli_query($link, $query);
      if(!$rezult){die('error : '.mysqli_error($link));}
    closeConnection($link);
      return $rezult;
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



function signeInUser ($username_in,$email_in,$password_in)
{
    $link = getConnection();
    $query="SELECT * FROM users where user_id and username like '$username_in' and email LIKE  '$email_in' AND password like '$password_in'";
    $rezult = mysqli_query($link, $query);
    if(!$rezult){die('error : '.mysqli_error($link));}
    return mysqli_fetch_assoc($rezult);
    closeConnection($link);
}
