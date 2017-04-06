<?php
//header("Refresh: 1");
/*1. Запишите в сессию время захода пользователя на сайт. При обновлении страницы
выводите сколько секунд назад пользователь зашел на сайт.*/

session_start();


$sec = 0;
if (!isset($_SESSION['date'])) {
    $_SESSION['date'] = date('Y-m-d H:i:s');
} else {
    $sec = time() - strtotime($_SESSION['date']);
}


/*3. Сделайте счетчик обновления страницы пользователем. Данные храните в сессии.
Скрипт должен выводить на экран количество обновлений. При первом заходе на
страницу он должен вывести сообщение о том, что вы еще не обновляли страницу.*/


if(!isset($_SESSION['ref']))
    $_SESSION['ref']=0;
if ($_SESSION['ref'] > 0)
{echo $_SESSION['ref'];}
else {echo "Вы еще не обновляли страницу";}
$_SESSION['ref']++

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>session</title>
</head>
<body>
<a href="index.php">На главную</a>
<a href="next_file.php">Запрос мыла</a>
<a href="form.php">На файл формы</a>

<h2>Hello youre enter in my site.</h2>
<br>
<br>
<br>
<h4>Your wisite in site, <?php echo $sec; ?> seconds ago</h4>

<?php
/*2. Спросите у пользователя email с помощью формы. Затем сделайте так, чтобы в
другой форме (имя, фамилия, пароль, email) при ее открытии поле email было
автоматически заполнено.*/
?>
<form action="next_file.php" method="post">
    <fieldset>
    <legend>Введите почту</legend>
        <br>
        <input type="text" name="email" placeholder="Введите свою почту"  />
    <br>
    <br>
    <br>
    <input type="submit" value="Отправить" />
    </fieldset>
</form>

<?php



?>

</body>
</html>



