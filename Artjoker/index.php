<?php

include_once 'autoload.php';

$plase=new Places();

$name='';
$target='';
$name=(string)$name;
$target=(string)$target;

$Plase=$plase->getReg_id();

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
            <?php foreach ($Plase  as $name => $target): ?>
                <option value="<?php echo $target; ?>"><p><?php echo  $name ;?></p></option>
            <?php endforeach; ?>
          </select>
        <br/>
        <div id="detale"></div>
        <br/>
        <button id="send" title="Отправить данные" >Зарегистрировать</button>
        <br/>
    </fieldset>
</form>

<script src="ajaxQuery.js"></script>
</body>
</html>

