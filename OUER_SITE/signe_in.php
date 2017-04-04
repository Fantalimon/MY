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
        if ($user['email']==$email) {return $user;}
    }
    return $isFound ;
}



if(!empty($_POST) && ($_POST['username_in']!='') && ($_POST['email_in']!='') && ($_POST['password_in'])!=''){
    
    $username= strip_tags(trim(($_POST['username_in'])));
    $email= strip_tags(trim($_POST['email_in']));
    $password= strip_tags(trim($_POST['password_in']));
    
    $users = getUsers();
    if (getUser($email, $users)==false)
    {
        header("refresh:1;url=http://127.0.0.1/sit.my/MY_DZ/OUER_SITE/sineup.php");
        ?> <script> alert ('Вы еще не зарегестрированны');</script> <?php
    }
    elseif(getUser($email, $users)==true) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['mail'] = $email;
        header(LOCATION);
    }
}
else{
header(LOCATION);
}

