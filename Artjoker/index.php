<?php

include_once 'autoload.php';

$plase=new Places();

$name='';
$target='';
$name=(string)$name;
$target=(string)$target;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title>form</title>
    <script src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
<form  method="post" action=" ">
    <fieldset title="персональные данные">
        <legend>Ваши данные</legend>
        <br/>
        <input id="inputName" type="text" title="ФИО" name="name" placeholder="ФИО"  />
        <br/>
        <br/>
        <input id="inputMail" type="text" title="почта" name="email" placeholder="ваша почта"  />
        <br/>
        <br/>
        
          <select id="selectTerritory" title="Выберите область" name="Territory"  required>
              <option value="">Выберете область</option>
            <?php  $plase->getReg_id(); ?>
          </select>
        <br/>
        <span id="detale"></span>
        <br/>
        <button id="send" title="Отправить данные" >Зарегистрировать</button>
        <br/>
    </fieldset>
</form>

<script src="ajaxQuery.js"></script>
</body>
</html>

