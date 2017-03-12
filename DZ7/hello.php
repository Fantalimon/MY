<?php
$phone = '';
$username = '';

if (isset($_COOKIE['phone']) || isset($_COOKIE['username']) ) {
    $phone = $_COOKIE['phone'];
    $username = $_COOKIE['username'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>hello</title>
</head>
<body>
<h3><a href="index.php">Переход на страничку inex</a></h3>
<h4> Привет <?php echo $username ?> </h4>

<form ​ action ​="hello.php" ​ method ​=" ​ GET ​ ">
    <fieldset title="Ваши данные">
        <legend>Ваши контактные данные</legend>
        <br>
        <input ​type="text" ​ name="username" placeholder="добавьте ваше  Ваше имя" value=" <?php echo $username ?> ">
        <br>
        <br>
        <input ​type="text" ​ name="seurname" placeholder="добавьте вашу фамилию">
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
