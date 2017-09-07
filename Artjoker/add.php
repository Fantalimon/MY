<?php
include_once 'autoload.php';

$name='';
$email='';
$Territory='';
$RayonsTowns='';
$Rayons='';
$Towns='';
$response=[];


$name =  htmlspecialchars(strip_tags(trim($_POST['name'])));
$email =  htmlspecialchars(strip_tags(trim($_POST['email']))) ;
$Territory = htmlspecialchars(strip_tags(trim($_POST['Territory']))) ;
$Towns =  htmlspecialchars(strip_tags(trim($_POST['Towns']))) ;
$RayonsTowns =  htmlspecialchars(strip_tags(trim($_POST['RayonsTowns'])));
$Rayons = htmlspecialchars(strip_tags(trim($_POST['Rayons']))) ;
$SMT =  htmlspecialchars(strip_tags(trim($_POST['SMT']))) ;

if(($name && $Territory && $email)==''){die();}
else {
    $userData = [
        'name' => $name,
        'email' => $email,
        'territory' => $Territory . ' ' . $Rayons . ' ' . $Towns . ' ' . $RayonsTowns . ' ' . $SMT
    ];
    $user = new Addusers($userData);
    $result = $user->getByEmail();
    if ($email !== $result['email']) {
        $save = $user->save();
        $response['newUser']=$userData;
    } else {
            $response['oldUser']=$result;
        }
    }
echo json_encode($response);
