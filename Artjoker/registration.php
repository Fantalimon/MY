<?php
include_once 'autoload.php';


//echo json_decode($_POST["name"]);
//echo json_decode($_POST["email"]);
//echo json_decode($_POST["Territory"]);

$handle='TEXT.txt';
$text=fopen($handle, 'a');
fwrite($text, $string);
fclose($text);




/*
if (!empty($_POST)) {

    $name='';
    $email='';
    $territory='';
    $terrytoryStr='';
    $towns='';
    $data='';




    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : '';
    $territory = isset($_POST['Territory']) ? strip_tags(trim($_POST['Territory'])) : '';
    $terrytoryStr = isset($_POST['Rayons']) ? strip_tags(trim($_POST['Rayons'])) : '';
    $towns = isset($_POST['Towns']) ? strip_tags(trim($_POST['Towns'])) : '';

   echo 'name / '.$name."<br>";
   echo 'email / '.$email."<br>";
   echo 'territory / '.$territory."<br>";
   echo 'terrytoryStr / '.$terrytoryStr."<br>";
   echo 'towns / '.$towns."<br>";


    $hintingTerrytory=mb_substr($territory, 0,2);

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

    if(!$terrytoryStr && $hintingTerrytory!== '80' and $hintingTerrytory!=='85')
    {
        echo "<br>";
        echo "<select  disabled>"."<option>"."Выберете город"."</option>"."</select>";
        echo "<br>";
    }elseif($hintingTerrytory!== '80' and $hintingTerrytory!=='85' ){
        $Hint->qualiTawns($territory, $terrytoryStr);
    }



    if(!$name or !$email or !$territory or !$terrytoryStr or !$towns or !filter_var($email, FILTER_VALIDATE_EMAIL)) {die();}
    else {
        $userData = [
            'name' => $name,
            'email' => $email,
            'territory' => $territory.' '.$terrytoryStr.' '.$towns
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
    };

*/
