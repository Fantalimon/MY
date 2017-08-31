<?php

include_once 'autoload.php';

$plase=new Places();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>form</title>
<script src="js/jquery-3.2.1.js"></script>
<!--    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>-->
</head>
<body>
<form id="myForm"  method="post" action=" ">
    <fieldset title="персональные данные">
        <legend>Ваши данные</legend>
        <br/>
        <input id="inputName"  type="text" title="ФИО" name="name" placeholder="ФИО"  />
        <br/>
        <br/>
        <input id="inputMail" type="text" title="почта" name="email" placeholder="ваша почта" />
        <br/>
        <br/>
          <select id="selectTerritory"   title="Выберите область"  name="Territory"  >
              <option value="">Выберете область</option>
            <?php  $plase->getReg_id(); ?>
          </select>
        <br/>
        
        <div id="detaleRayons"></div>
        <div id="detaleTowns"></div>
        
        <br/>
        <button id="send"  title="Отправить данные" >Зарегистрировать</button>
        <br/>
    </fieldset>
</form>

<div id="yes"></div>

<script src="ajaxQuery.js"></script>
</body>
</html>

