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

$name = isset($_POST['name']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['name']))), $start) : '';
$seurname = isset($_POST['seurname']) ? htmlspecialchars(strip_tags(trim($_POST['seurname']))) : '';
$sex = isset($_POST['sex']) ? htmlspecialchars(strip_tags(trim($_POST['sex']))) : '';
$group = isset($_POST['group']) ? htmlspecialchars(strip_tags(trim($_POST['group']))) : '';
$email = isset($_POST['email']) ? htmlspecialchars(strip_tags(trim($_POST['email']))) : '';
$balls = isset($_POST['balls']) ? htmlspecialchars(strip_tags(trim($_POST['balls']))) : '';
$berd_year = isset($_POST['berd_year']) ? htmlspecialchars(strip_tags(trim($_POST['berd_year']))) : '';
$place = isset($_POST['place']) ? htmlspecialchars(strip_tags(trim($_POST['place']))) : '';



function great_file($name,$seurname,$sex,$group,$email,$balls,$berd_year,$place)
{
    $date = date("Y-M-d H:i:s");
    $handle = 'REGISTRATION.txt';
    $string = $date . ' name :' . ' > [ ' . $name . ' ]' . PHP_EOL;
    $string .= $date . ' seurname :' . ' > [ ' . $seurname . ' ]' . PHP_EOL;
    $string .= $date . ' sex :' . ' > [ ' . $sex . ' ]' . PHP_EOL;
    $string .= $date . ' group :' . ' > [ ' .$group  . ' ]' . PHP_EOL;
    $string .= $date . ' email :' . ' > [ ' . $email . ' ]' . PHP_EOL;
    $string .= $date . ' balls :' . ' > [ ' . $balls . ' ]' . PHP_EOL;
    $string .= $date . ' berd_year :' . ' > [ ' . $berd_year . ' ]' . PHP_EOL;
    $string .= $date . ' place :' . ' > [ ' . $place. ' ]' . PHP_EOL;
    $string.=PHP_EOL;
    $text = fopen($handle, 'w+');
    fwrite($text, $string);
    fclose($text);
    return;
}

great_file($name, $seurname, $sex, $group, $email, $balls, $berd_year, $place);

 


