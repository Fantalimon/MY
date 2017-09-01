<?php

include_once 'autoload.php';

$plase=new Places();

?>

<!DOCTYPE html>
<html lang="en">
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
          <select id="selectTerritory" class="chosen-rtl" title="Выберите область"  name="Territory"  >
              <option value="">Выберете область</option>
            <?php  $plase->getReg_id(); ?>
          </select>
        <br/>

        <div id="detaleTowns"></div>
        <div id="detaleRayons"></div>
        <div id="detaleSMT"></div>
        
        <br/>
        <button id="send"  title="Отправить данные" >Зарегистрировать</button>
        <br/>
    </fieldset>
</form>

<div id="yes"></div>

<script src="ajaxQuery.js"></script>
</body>
</html>

