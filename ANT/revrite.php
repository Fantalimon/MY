<?php

include_once 'autoload.php';
$id='';
$name = '';
$seurname = '';
$sex = '';
$group = '';
$email = '';
$balls = '';
$berd_year='';
$place='';
$userData=[];
$error=[];

$user = unserialize($_SESSION['userdata']);
$id=$user->getId();

$name = isset($_POST['name']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['name']))), 0,20,'UTF-8') : '';
$seurname = isset($_POST['seurname']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['seurname']))),0,20,'UTF-8') : '';
$sex = isset($_POST['sex']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['sex']))), 0,1,'UTF-8')  : '';
$mygroup = isset($_POST['mygroup']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['mygroup']))), 0,5,'UTF-8')  : '';
$email = isset($_POST['email']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['email']))), 0,40,'UTF-8')  : '';
$balls = isset($_POST['balls']) ?  mb_substr(htmlspecialchars(strip_tags(trim($_POST['balls']))), 0,4,'UTF-8') : '';
$berd_year = isset($_POST['berd_year']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['berd_year']))), 0,4,'UTF-8') : '';
$place = isset($_POST['place']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['place']))), 0,20,'UTF-8')  : '';

$id=(int)$id;
$name=(string)$name;
$seurname=(string)$seurname;
$sex=(int)$sex;
$mygroup=(string)$mygroup;
$email=(string)$email;
$balls=(int)$balls;
$berd_year=(string)$berd_year;
$place=(string)$place;




if(preg_match('/^[0-9]{1,10}$/', $id)===1){
    $userData['id']=$id;
}else{
    $userData['id']='ОШИБКА';
    $error['id']='Не корректный айди';
}

if(preg_match('/^[\wа-яёії]{2,20}/iu', $name)===1){
    $userData['name']=$name;
}else{
    $userData['name']='ОШИБКА';
    $error['name']='Не корректное имя';
}


if(preg_match('/^[\wа-яёії]{2,20}/iu', $seurname)===1){
    $userData['seurname']=$seurname;
}else{
    $userData['seurname']='ОШИБКА';
    $error['seurname']='Не корректное отчество';
}


if(preg_match('/^0|1$/', $sex)===1){
    $userData['sex']=$sex;
}else{
    $userData['sex']='ОШИБКА';
    $error['sex']='Не корректный пол';
}


if(preg_match('/^[\wа-яёії0-9]{2,5}$/iu', $mygroup)===1){
    $userData['mygroup']=$mygroup;
}else{
    $userData['mygroup']='ОШИБКА';
    $error['mygroup']='Не корректная группа';
}


if(preg_match('/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/i', $email)===1){
    $userData['email']=$email;
}else{
    $userData['email']='ОШИБКА';
    $error['email']='Не корректная почта';
}


if(preg_match('/^[0-9]{1,4}$/', $balls)===1){
    $userData['balls']=$balls;
}else{
    $userData['balls']='ОШИБКА';
    $error['balls']='Не корректные быллы';
}


if(preg_match('/^[0-9]{4}$/', $berd_year)===1){
    $userData['berd_year']=$berd_year;
}else{
    $userData['berd_year']='ОШИБКА';
    $error['berd_year']='Не корректный год рождения';
}


if(preg_match('/^[\wа-яёії]{2,20}/iu', $place)===1){
    $userData['place']=$place;
}else{
    $userData['place']='ОШИБКА';
    $error['place']='Не корректный город';
}


if (in_array('ОШИБКА', $userData,true)){
    echo json_encode($error);
}else{
    
    $user=new Rewrite($userData);
    $result=$user->save();
    
    if($result==true){
        $_SESSION['userdata']=serialize($user);
//        header('location: ' . SITE);
    }
    
};



 


