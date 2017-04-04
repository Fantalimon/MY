<?php

include_once "config.php";


function fileOpen()
{
 $file='users.txt';
    $mode='a+';
    $resource=fopen($file, $mode) or die('file can not by oppened');
    return $resource;
}

function fileClose ($resource)
{
    fclose($resource);
}



function getUsers()
{
    $resourse = fileOpen();
    $user=[];
    $users=[];
    while(!feof($resourse))
    {
        $user = fgets($resourse);
        if($user==false){break;}
        $user =explode(":", $user);
        $users[]=['username'=>trim($user[0]," \t\n\r\0\x0B"), 'email'=>trim($user[1]," \t\n\r\0\x0B"), 'password'=>trim($user[2]," \t\n\r\0\x0B")];
    }

    fileClose($resourse);
return $users;
}


function getUser($email,$users)
{
    $isFound =false;
    if(empty($users)){return $isFound;}
    
        foreach($users as $user)
        {
            if ($user['email']==$email) {return $user;};
        }
    return $isFound;
}

function addUsers ($userdata)
{
  $user =    $userdata['username'].':'.$userdata['email'].':'.$userdata['password'].PHP_EOL;
    $resource=fileOpen();
    fwrite($resource, $user);
    fileClose($resource);
}


if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){
   
    $username= strip_tags(trim(($_POST['username'])));
    $email= strip_tags(trim($_POST['email']));
    $password= strip_tags(trim($_POST['password']));

$users = getUsers();
if (empty(getUser($email, $users))==false)
{
    header(LOCATION);
}
else{
    $userdata =
    [
        'username'=>$username,
        'email'=>$email,
        'password'=>$password
    ];
    addUsers($userdata);
    
    session_start();
    $_SESSION['username']=$username;
    $_SESSION['mail']=$email;
   header(LOCATION);
}
    header(LOCATION);
}

?>
