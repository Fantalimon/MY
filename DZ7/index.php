<?php
$username='';
if (!empty($_GET)) {
    $username = empty($_GET['username']) ? '' : trim(strip_tags($_GET['username']));
}
setcookie('username',$username,time()+3600,"DZ7");

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
        <input ​type="text" ​ name="username">
        <br>
        <br>
        <input type="submit" value="Отправить ваш вариант">
    </fieldset>
</form>


</body>
</html>
<?php
?>
