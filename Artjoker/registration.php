<?php
include_once 'autoload.php';
session_start();

    $name='';
    $email='';
    $Territory='';
    $RayonsTowns='';
    $Rayons='';
    $Towns='';

    $name = isset($_POST['name']) ? htmlspecialchars(strip_tags(trim($_POST['name']))) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(strip_tags(trim($_POST['email']))) : '';
    $Territory = isset($_POST['Territory']) ? htmlspecialchars(strip_tags(trim($_POST['Territory']))) : '';
    $Towns = isset($_POST['Towns']) ? htmlspecialchars(strip_tags(trim($_POST['Towns']))) : '';
    $RayonsTowns = isset($_POST['RayonsTowns']) ? htmlspecialchars(strip_tags(trim($_POST['RayonsTowns']))) : '';
    $Rayons = isset($_POST['Rayons']) ? htmlspecialchars(strip_tags(trim($_POST['Rayons']))) : '';
    $SMT = isset($_POST['SMT']) ? htmlspecialchars(strip_tags(trim($_POST['SMT']))) : '';

   

    $Hint=new Places();

$response=[];



if($Territory){
    
    $hintingTerrytory=mb_substr($Territory, 0,2);
    
    $response['towns']=$Hint->qualiTowns($Territory);
    $response['rayons']=$Hint->qualiRayons($Territory);
    
    if($hintingTerrytory =='80' or $hintingTerrytory =='85' ) {
        $response['rayons_towns']=$Hint->qualiTawnsRayons($hintingTerrytory);
        $response['towns']=null;
        $response['rayons']=null;
    }
    if($Towns){
        $response['rayons_towns']=$Hint->qualiRayonsTowns($Territory, $Towns);
    }
    if($Rayons){
        $response['smt']=$Hint->qualiSMT($Territory,$Rayons);
    }
}

echo json_encode($response);
    
// TODO: todo jQuery viev contol select menu.

//if(!$name or !$email or !$Territory or !$Rayons or !$Towns or !filter_var($email, FILTER_VALIDATE_EMAIL)) {die();}
//else {
//    $userData = [
//        'name' => $name,
//        'email' => $email,
//        'territory' => $Territory.' '.$Rayons.' '.$Towns
//    ];
//    $user = new Addusers($userData);
//    $result=$user->getByEmail();
//    if ($email !== $result['email']){$save=$user->save();}
//    else{
//        echo "Уже есть такой пользователь"."<br>";
//        foreach ($result as $key=>$value){
//            echo $key.' /--> '.$value."<br>";
//        }
//    }
//}

 


