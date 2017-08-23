<?php
include_once 'autoload.php';

if (!empty($_POST)) {
    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : '';
    $territory = isset($_POST['Territory']) ? strip_tags(trim($_POST['Territory'])) : '';
    $terrytoryStr = isset($_POST['Rayons']) ? strip_tags(trim($_POST['Rayons'])) : '';
    $towns = isset($_POST['Towns']) ? strip_tags(trim($_POST['Towns'])) : '';
    $json=[];
    
    
    $Hint=new Places();
    
    
    if (!$territory)
    {
        echo "<br>";
        echo "<select  disabled>"."<option>"."Выберете район"."</option>"."</select>";
        echo "<br>";
    }else
    {
        $Hint->qualiRayons($territory);
    }
    
    if(!$terrytoryStr)
    {
        echo "<br>";
        echo "<select  disabled>"."<option>"."Выберете город"."</option>"."</select>";
        echo "<br>";
    }else{
        $Hint->qualiTawns($territory, $terrytoryStr);
    }
    
    
    
    if (!$name or !$email or !$territory or !$terrytoryStr or !$towns) {
        $json['error'] = 'Не заполненное поле))!';
//        echo json_encode($json,JSON_UNESCAPED_UNICODE);
        die();
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $json['error'] = 'Нe вeрный фoрмaт email! >_<';
//         echo json_encode($json,JSON_UNESCAPED_UNICODE);
        die();
    }
    else {
        $userData = [
            'name' => $name,
            'email' => $email,
            'territory' => $territory.' '.$terrytoryStr.' '.$towns
        ];
        
        $user = new Addusers($userData);
        $user->tableinfo();
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
       
    };


};

