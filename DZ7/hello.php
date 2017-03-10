<?php
$username='';
$phone='';
if (empty($_COOKIE)) {
    $username = $_COOKIE['username'];
    $phone = $_COOKIE['phone'];
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>hello</title>
</head>
<body>
<h3><a href="index.php">Переход на страничку inex</a></h3>
<h4> Привет  <?php echo $username ?> </h4>

<form ​ action ​ = "hello.php" ​ method ​ =" ​ GET ​ ">
    <fieldset title="Ваши данные">
        <legend>Ваши контактные данные</legend>
        <br>
        <input ​type="text" ​ name="<?php echo $username?>" placeholder="добавьте ваше  Ваше имя" value="<?php echo $username?>">
        <br>
        <br>
        <input ​type="text" ​ name="seurname" placeholder="добавьте вашу фамилию" >
        <br>
        <br>
        <input ​type="text" ​ name="<?php echo $phone?>" placeholder="введите номер телефона" value="<?php echo $phone?>">
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
