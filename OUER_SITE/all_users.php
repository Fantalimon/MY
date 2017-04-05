<?php
$handle=fopen('users.txt','r');
$user_op='';
$users_arr=[];
while(!feof($handle))
{
$user_op=fgets($handle);
if($user_op==false){break;}
$user_op=explode(":", $user_op);
$users_arr[]=
[
  'username'=>trim($user_op[0]),
  'email'=>trim($user_op[1]),
//  'password'=>trim($user_op[2])
];
}
fclose($handle);
foreach ($users_arr as $us)
{
    echo "Username: ".$us['username'].'  ,  '."e-mail: ".$us['email']."<br>";
}
