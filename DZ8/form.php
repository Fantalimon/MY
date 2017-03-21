<?php
session_start();

$age='';
$city='';

if(!empty($_POST)){
    if(isset($_POST['city']) || isset($_POST['age'])){

        $city=strip_tags(trim($_POST['city']));
        $age=strip_tags(trim($_POST['age']));

        $_SESSION['age']=$age;
        $_SESSION['city']=$city;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>form</title>
</head>
<body>
<form>
    <fieldset title="персональные данные">
        <legend>Ваши данные</legend>
        <br>
        <input type="text" title="имя" name="name" placeholder="имя" />
        <br>
        <br>
        <input type="text" title="Город" name="city" placeholder="город" value="<?php echo $city?>"/>
        <br>
        <br>
        <input type="text" title="Возраст" name="age" placeholder="возраст" value="<?php echo $age ?>" />
        <br>
        <br>
        <input type="button" value="Отправить"/>
    </fieldset>
</form>

</body>
</html>

