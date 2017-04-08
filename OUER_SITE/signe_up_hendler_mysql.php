<?php
/*session_start();
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


if(!empty($_POST) && ($_POST['username']!='') && ($_POST['email']!='') && ($_POST['password'])!=''){
   
    $username= strip_tags(trim(($_POST['username'])));
    $email= strip_tags(trim($_POST['email']));
    $password= strip_tags(trim($_POST['password']));

$users = getUsers();
if (empty(getUser($email, $users))==false)
{
    header(LOCATION);
}
else {
    $userdata =
        [
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ];
    addUsers($userdata);
    
    
    $_SESSION['username'] = $username;
    $_SESSION['mail'] = $email;
    header(LOCATION);
}
}
else{header(LOCATION);}
*/
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
