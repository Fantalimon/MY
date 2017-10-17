<?php
include_once 'autoload.php';

$name = '';
$seurname = '';
$sex = '';
$group = '';
$email = '';
$balls = '';
$berd_year='';
$place='';
$userData=[];
$error='';

$name = isset($_POST['name']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['name']))), 0,20,'UTF-8') : '';
$seurname = isset($_POST['seurname']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['seurname']))),0,20,'UTF-8') : '';
$sex = isset($_POST['sex']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['sex']))), 0,1,'UTF-8')  : '';
$group = isset($_POST['group']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['group']))), 0,4,'UTF-8')  : '';
$email = isset($_POST['email']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['email']))), 0,40,'UTF-8')  : '';
$balls = isset($_POST['balls']) ?  mb_substr(htmlspecialchars(strip_tags(trim($_POST['balls']))), 0,2,'UTF-8') : '';
$berd_year = isset($_POST['berd_year']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['berd_year']))), 0,3,'UTF-8') : '';
$place = isset($_POST['place']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['place']))), 0,20,'UTF-8')  : '';

$name=(string)$name;
$seurname=(string)$seurname;
$sex=(int)$sex;
$group=(string)$group;
$email=(string)$email;
$balls=(int)$balls;
$berd_year=(string)$berd_year;
$place=(string)$place;

if(preg_match('/^[\wа-яёії]{3,20}$/i', $name)===1){
    $userData['name']=$name;
}else{
    $userData['name']='ОШИБКА';
    $error='Не корректное имя';
}


if(preg_match('/^[\wа-яёії]{3,20}$/i', $seurname)===1){
    $userData['seurname']=$seurname;
}else{
    $userData['seurname']='ОШИБКА';
    $error='Не корректное отчество';
}


if(preg_match('/^0|1$/', $sex)===1){
    $userData['sex']=$sex;
}else{
    $userData['sex']='ОШИБКА';
    $error='Не корректный пол';
}


if(preg_match('/^[\wа-яёії0-9]{2,5}$/i', $group)===1){
    $userData['group']=$group;
}else{
    $userData['group']='ОШИБКА';
    $error='Не корректная группа';
}


if(preg_match('/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/i', $email)===1){
    $userData['email']=$email;
}else{
    $userData['email']='ОШИБКА';
    $error='Не корректная почта';
}


if(preg_match('/^[0-9]{1,3}$/', $balls)===1){
    $userData['balls']=$balls;
}else{
    $userData['balls']='ОШИБКА';
    $error='Не корректные быллы';
}


if(preg_match('/^[0-9]{4}$/', $berd_year)===1){
    $userData['berd_year']=$berd_year;
}else{
    $userData['berd_year']='ОШИБКА';
    $error='Не корректный год рождения';
}


if(preg_match('/^[\wа-яёії]{3,20}$/i', $place)===1){
    $userData['place']=$place;
}else{
    $userData['place']='ОШИБКА';
    $error='Не корректный город';
}


if (in_array('ОШИБКА', $userData,true)){
echo json_encode($userData);
}else{
    (new Addusers($userData))->save();
};





//function great_file($name,$seurname,$sex,$group,$email,$balls,$berd_year,$place)
//{
//    $date = date("Y-M-d H:i:s");
//    $handle = 'REGISTRATION.txt';
//    $string = $date . ' name :' . ' > [ ' . $name . ' ]' . PHP_EOL;
//    $string .= $date . ' seurname :' . ' > [ ' . $seurname . ' ]' . PHP_EOL;
//    $string .= $date . ' sex :' . ' > [ ' . $sex . ' ]' . PHP_EOL;
//    $string .= $date . ' group :' . ' > [ ' .$group  . ' ]' . PHP_EOL;
//    $string .= $date . ' email :' . ' > [ ' . $email . ' ]' . PHP_EOL;
//    $string .= $date . ' balls :' . ' > [ ' . $balls . ' ]' . PHP_EOL;
//    $string .= $date . ' berd_year :' . ' > [ ' . $berd_year . ' ]' . PHP_EOL;
//    $string .= $date . ' place :' . ' > [ ' . $place. ' ]' . PHP_EOL;
//    $string.=PHP_EOL;
//    $text = fopen($handle, 'w+');
//    fwrite($text, $string);
//    fclose($text);
//    return;
//}
//
//great_file($name, $seurname, $sex, $group, $email, $balls, $berd_year, $place);

 


