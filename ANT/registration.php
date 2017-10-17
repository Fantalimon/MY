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

$name = isset($_POST['name']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['name']))), 0,20,'UTF-8') : '';
$seurname = isset($_POST['seurname']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['seurname']))),0,20,'UTF-8') : '';
$sex = isset($_POST['sex']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['sex']))), 0,1,'UTF-8')  : '';
$group = isset($_POST['group']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['group']))), 0,4,'UTF-8')  : '';
$email = isset($_POST['email']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['email']))), 0,99,'UTF-8')  : '';
$balls = isset($_POST['balls']) ?  mb_substr(htmlspecialchars(strip_tags(trim($_POST['balls']))), 0,2,'UTF-8') : '';
$berd_year = isset($_POST['berd_year']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['berd_year']))), 0,3,'UTF-8') : '';
$place = isset($_POST['place']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['place']))), 0,99,'UTF-8')  : '';



$userData=[
    'name' => $name,
    'seurname'=>$seurname,
    'sex'=>$sex,
    'group'=>$group,
    'email' => $email,
    'balls'=>$balls,
    'berd_year'=>$berd_year,
    'place' => $place
];

(new Addusers($userData))->save();


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

 


