<?php
include_once 'autoload.php';

//$terrytoryStr='';
//$error='';

if (!empty($_POST)) {
    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : '';
    $territory = isset($_POST['Territory']) ? strip_tags(trim($_POST['Territory'])) : '';
    $terrytoryStr = isset($_POST['Rayons']) ? strip_tags(trim($_POST['Rayons'])) : '';
    $towns = isset($_POST['Towns']) ? strip_tags(trim($_POST['Towns'])) : '';
    
    
//    $result = false;
    
/*    if (empty($name && $email && $territory)) {
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
        
        ];*/
        
/*        $user = new User($userData);
        $result = $user->save();*/
  
echo '/ '.$territory."<br>".'/ '.$terrytoryStr."<br>".'/ '.$towns."<br>";
    
$Hint=new Places();
    
//    if (!$territory)
//    {
//        echo "<br>";
//        echo "<select  disabled>"."<option>"."Выберете район"."</option>"."</select>";
//        echo "<br>";
//   }else
//   {
//       $Hint->qualiRayons($territory);
//    }
//
//    if(!$terrytoryStr)
//    {
//        echo "<br>";
//        echo "<select  disabled>"."<option>"."Выберете город"."</option>"."</select>";
//        echo "<br>";
//    }
//    else{
//        $Hint->qualiTawns($territory, $terrytoryStr);
//    }

   $Hint->qualiRayons($territory);
    $Hint->qualiTawns($territory, $terrytoryStr);

};

