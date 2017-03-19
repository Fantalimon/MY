<?php
$phone = '';
$username = '';
$seurname ='';

if (isset($_COOKIE['phone']) || isset($_COOKIE['username']) ) {
    $phone = $_COOKIE['phone'];
    $username = $_COOKIE['username'];
}


if(!empty($_GET))
{$seurname = empty($_GET['seurname']) ? '' : trim(strip_tags($_GET['seurname']));}

setcookie('seurname',$seurname,time()+3600);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>hello</title>
</head>
<body>
<h3><a href="index.php">Переход на страничку inex</a></h3>
<h3><a href="hello.php">Переход на страничку hello</a></h3>
<h3><a href="shell.php">Переход на страничку shell</a></h3>
<h4> Привет <?php echo $username ?> </h4>

<form ​ action ​="hello.php" ​ method ​=" ​ GET ​ ">
    <fieldset title="Ваши данные">
        <legend>Ваши контактные данные</legend>
        <br>
        <input ​type="text" ​ name="username" placeholder="добавьте ваше  Ваше имя" value=" <?php echo $username ?> " />
        <br>
        <br>
        <input ​type="text" ​ name="seurname" placeholder="добавьте вашу фамилию" value="<?php  echo $seurname ?>" />
        <br>
        <br>
        <input ​type="text" ​ name="phone" placeholder="введите номер телефона" value=" <?php echo $phone ?> ">
        <br>
        <br>
        <br>
        <input type="submit" value="Отправить ваш вариант">
    </fieldset>
</form>


</body>
</html>
<?php

?>
