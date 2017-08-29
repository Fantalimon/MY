<?php
include_once 'autoload.php';

    $name='';
    $email='';
    $Territory='';
    $Rayons='';
    $Towns='';
    $data='';

    $name = isset($_POST['name']) ? htmlspecialchars(strip_tags(trim($_POST['name']))) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(strip_tags(trim($_POST['email']))) : '';
    $Territory = isset($_POST['Territory']) ? htmlspecialchars(strip_tags(trim($_POST['Territory']))) : '';
    $Rayons = isset($_POST['Rayons']) ? htmlspecialchars(strip_tags(trim($_POST['Rayons']))) : '';
    $Towns = isset($_POST['Towns']) ? htmlspecialchars(strip_tags(trim($_POST['Towns']))) : '';

    $hintingTerrytory=mb_substr($Territory, 0,2);

    $Hint=new Places();

$notRayonsTowns=$Hint->qualiTawnsRayons($Territory, $Rayons);

    if ($Territory)
    {
     $Hint->qualiRayons($Territory);
    }

    if(!$Rayons && $hintingTerrytory!== '80' and $hintingTerrytory!=='85')
    {
    }
    elseif($hintingTerrytory!=='80' and $hintingTerrytory!=='85' and $notRayonsTowns!=1)
    {
        $Hint->qualiTawns($Territory, $Rayons);
    }


    
    if(!$name or !$email or !$Territory or !$Rayons or !$Towns or !filter_var($email, FILTER_VALIDATE_EMAIL)) {die();}
    else {
        $userData = [
            'name' => $name,
            'email' => $email,
            'territory' => $Territory.' '.$Rayons.' '.$Towns
        ];
        
        $user = new Addusers($userData);
        
        $result=$user->getByEmail();
        
        if ($email !== $result['email']){
            $save=$user->save();
        }
        else{
            echo "Уже есть такой пользователь"."<br>";
            foreach ($result as $key=>$value){
                echo $key.' /--> '.$value."<br>";
            }
        }
    }



