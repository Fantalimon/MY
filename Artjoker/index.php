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
<!--    <link rel="stylesheet" href="chosen/docsupport/style.css">-->
<!--    <link rel="stylesheet" href="chosen/docsupport/prism.css">-->
<!--    <link rel="stylesheet" href="chosen/chosen.css">-->
    <script src="js/jquery-3.2.1.min.js"></script>
<!--    <script src="chosen/chosen.jquery.js" type="text/javascript"></script>-->
<!--    <script src="chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>-->
<!--    <script src="chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>-->
</head>
<body>
<form id="myForm" method="post" action=" ">
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
        
        <div id="detale"></div>
        
        <br/>
        <button id="send"  title="Отправить данные" >Зарегистрировать</button>
        <br/>
    </fieldset>
</form>

<script src="ajaxQuery.js"></script>
</body>
</html>

