<?php

include_once 'autoload.php';

$plase=new Places();
$auto=new Autovalidator();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>form</title>
    <link rel="stylesheet" href="chosen/chosen.css">
<script src="js/jquery-3.2.1.js"></script>
<script src="chosen/chosen.jquery.js"></script>
    
</head>
<body>
<form id="myForm"  method="post" action=" ">
    <fieldset title="персональные данные">
        <legend>Ваши данные</legend>
        <br/>
        <input id="inputName" type="text" title="ФИО" name="name" placeholder="ФИО"  />
        <br/>
        <br/>
        <input id="inputMail" type="text" title="почта" name="email" placeholder="ваша почта" />
        <br/>
        <br/>
          <select id="selectTerritory" class="chosen-select" title="Выберите область"  name="Territory"  >
              <option value="">Выберете область</option>
            <?php $plase->getReg_id(); ?>
          </select>
        <br/>
        <div id="detaleTowns"></div>
        <div id="detaleRayonsTowns"></div>
        <div id="detaleRayons"></div>
        <div id="detaleSMT"></div>
        <br/>
        <button id="send"  title="Отправить данные" >Зарегистрировать</button>
        <br/>
    </fieldset>
</form>
<div id="yes"></div>

<?php

$i = 0;
$a = 0;
$q=0;
$arr = [];
$auto->getReg();


//function restart($x)
//{
//
//    if($x<6){
//        $now=time();
//        echo $now."<br>";
//        $next= $now + strtotime('20 seconds');
//        echo ' '.$next."<br>";
//
//        restart($x+1);
//    };
//};
//
//restart(0);

    $start = microtime(true);
    while ($i < 1000) {
        
        $auto->getTer();
        $name = $auto->Autoname();
        $mail = $auto->Autoemail() . '@' . $auto->Autodomen() . '.' . $auto->Autoheaddomen();
        $plase = $auto->UnionSelect();
        
        $arr[$i] = [
            'name' => $name,
            'email' => $mail,
            'territory' => $plase,
        ];
        $user = new Addusers($arr[$i]);
        $user->save();
        $i++;
    }
    $end = microtime(true);
    $time = ($end - $start);



header("Refresh: 5");
    echo "генирация: " . $time . "<br/>";
echo 'В базе вот столько записей '.$auto->count();
?>

<script src="ajaxQuery.js"></script>
</body>
</html>

