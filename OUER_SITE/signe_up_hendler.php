<?php
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
    $users=[];
    while(!feof($resourse))
    {
        $user = fgets($resourse);
        $user =explode(":", $user);
 $users[]=['username'=>$user, 'Email'=>$user, 'password'=>$user];
    }
    fileClose($resourse);
return $users;
}

function getUser($email,$users)
{
    $isFound =false;
    if(empty($users)){return $isFound;}
    
        foreach($users as $user){
        if ($user['Email']==$email){
            return $user;
        };}
    return $isFound;
}

function addUsers ($userdata)
{
  $user =    $userdata['username'].':'.$userdata['Email'].':'.$userdata['password'].PHP_EOL;
    $resource=fileOpen();
    fwrite($resource, $user);
}



if(!empty($_POST)){
    $username=$_POST['username'];
    $email=$_POST['Email'];
    $password=$_POST['password'];

$users = getUsers();
if (empty(getUser($email, $users)))
{
    $userdata =[
        'username'=>$username,
        'Email'=>$email,
        'password'=>$password
    ];
}
addUsers($userdata);
// todo: add user to session
    header('location:http://127.0.0.1/sit.my/index_new_new.php');

}
?>
