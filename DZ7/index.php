<?php
$username='';
$phone='';
$age=mt_rand(10,70);
$berthday='';
if (!empty($_GET)) {
    $username = empty($_GET['username']) ? '' : trim(strip_tags($_GET['username']));
    $phone = empty($_GET['phone']) ? '' : trim(strip_tags($_GET['phone']));
    $berthday = empty($_GET['berthday']) ? '' : trim(strip_tags($_GET['berthday']));
}
setcookie('username',$username,time()+3600,"DZ7");
setcookie('phone',$phone,time()+3600,"DZ7");
setcookie('age',$age,time()+3600*3,"DZ7");
setcookie('bertnday',$berthday,time()+366*24*3600,"DZ7");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
</head>
<body>
<h3><a href="hello.php">Переход на страничку hello</a></h3>

<form ​ action ​ = "index.php" ​ method ​ =" ​ GET ​ ">
    <fieldset title="Ваше имя">
        <legend>Введите имя</legend>
        <input ​type="text" ​ name="username" placeholder=" ваше имя">
        <br>
        <br>
        <input ​type="text" ​ name="phone" placeholder=" ваш телефон">
        <br>
        <br>
        <input ​type="text" ​ name="berthday" placeholder="День рождения у вас когда?">
        <br>
        <br>
        <input type="submit" value="Отправить ваш вариант">
    </fieldset>
</form>


</body>
</html>
<?php

$berthday=strtotime($berthday);
$difference=time()-$berthday;
$year=($difference%31536000);
$rez=(31536000-$year);
$rezult_day=floor($rez/86400);
echo $rezult_day;

?>
