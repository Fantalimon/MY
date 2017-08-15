<?php
session_start();

include_once 'autoload.php';


$terrytoryStr='';
$error='';

if (!empty($_POST)) {
    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : '';
    $territory = isset($_POST['territory']) ? strip_tags(trim($_POST['territory'])) : '';
    
    $result = false;
    
    if (empty($name && $email && $territory)) {
        $error = 'Заполните поля';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
         $error = 'Некорректно введен Адресс';
    }
    else {
        $userData = [
            'name' => $name,
            'email' => $email,
            'territory' => $territory
        
        ];
        
/*        $user = new User($userData);
        $result = $user->save();*/
        
    }
    
    
    
    
    switch ($territory){
        case 01:
            $terrytoryStr = 'Автономна Республіка Крим';
            break;

         case 05:
         $terrytoryStr = 'Вінницька область';
           break;

         case 07:
         $terrytoryStr = 'Волинська область';
           break;

         case 12:
         $terrytoryStr = 'Дніпропетровська область';
           break;

         case 14:
         $terrytoryStr = 'Донецька область';
           break;

         case 18:
         $terrytoryStr = 'Житомирська область';
           break;

         case 21:
         $terrytoryStr = 'Закарпатська область';
           break;

         case 23:
         $terrytoryStr = 'Запорізька область';
           break;

         case 26:
         $terrytoryStr = 'Івано-Франківська область';
           break;

         case 32:
         $terrytoryStr = 'Київська область';
           break;

         case 35:
         $terrytoryStr = 'Кіровоградська область';
           break;

         case 44:
         $terrytoryStr = 'Луганська область';
           break;

         case 46:
         $terrytoryStr = 'Львівська область';
           break;

         case 48:
         $terrytoryStr = 'Миколаївська область';
           break;

         case 51:
         $terrytoryStr = 'Одеська область';
           break;

         case 53:
         $terrytoryStr = 'Полтавська область';
           break;

         case 56:
         $terrytoryStr = 'Рівненська область';
           break;

         case 59:
         $terrytoryStr = 'Сумська область';
           break;

         case 61:
         $terrytoryStr = 'Тернопільська область';
           break;

         case 63:
         $terrytoryStr = 'Харківська область';
           break;

         case 65:
         $terrytoryStr = 'Херсонська область';
           break;

         case 68:
         $terrytoryStr = 'Хмельницька область';
           break;

         case 71:
         $terrytoryStr = 'Черкаська область';
           break;

         case 73:
         $terrytoryStr = 'Чернівецька область';
           break;

         case 74:
         $terrytoryStr = 'Чернігівська область';
           break;

         case 80:
         $terrytoryStr = 'м.Київ';
           break;

         case 85:
         $terrytoryStr = 'м.Севастополь';
           break;

        default : break;



    }

    
    $Hint=new Places();
    
    $Towns=$Hint->qualification($territory, $terrytoryStr);
    
    $Rayons=$Hint->mainqualification($territory, $terrytoryStr);
    
    $_SESSION['Towns']=$Towns;
    $_SESSION['Rayons']=$Rayons;
    
    header("Refresh: 2 ; url=".SITE);
    echo $error;
    
}


