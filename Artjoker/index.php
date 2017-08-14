<?php

//session_start();

include_once 'autoload.php';

$plase=new Places();

$name='';
$target='';
$name=(string)$name;
$target=(string)$target;

$Plase=$plase->getReg_id();

//$Towns=$_SESSION['Towns'];
//$Rayons=$_SESSION['Rayons'];




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>form</title>
</head>
<body>
<form  method="post" action="registration.php">
    <fieldset title="персональные данные">
        <legend>Ваши данные</legend>
        <br/>
        <input type="text" title="ФИО" name="name" placeholder="ФИО"  />
        <br/>
        <br/>
        <input type="text" title="почта" name="email" placeholder="ваша почта"  />
        <br/>
        <br/>
          <select title="Выберите область" name="territory"  required>
            <?php foreach ($Plase  as $name => $target): ?>
                <option value="<?php echo $target; ?>"><p><?php echo  $name ;?></p></option>
            <?php endforeach; ?>
          </select>
        
<!--        -->
<!--        <select title="Выберете город" >-->
<!--              --><?php //foreach ($Towns  as $name => $target): ?>
<!--                  <option value="--><?php //echo $target; ?><!--"><p>--><?php //echo  $name ;?><!--</p></option>-->
<!--              --><?php //endforeach; ?>
<!--        </select>-->
<!--        -->
<!--        <select title="Выберете район">-->
<!--              --><?php //foreach ($Rayons  as $name => $target): ?>
<!--                  <option value="--><?php //echo $target; ?><!--"><p>--><?php //echo  $name ;?><!--</p></option>-->
<!--              --><?php //endforeach; ?>
<!--        </select>-->
       
        <br/>
        <br/>
        <input type="submit" title="Отправить данные" value="Зарегистрировать" />
        <input type="reset" title="Очистить даные" value="Очистить" />
        <br/>
    </fieldset>
</form>

</body>
</html>

