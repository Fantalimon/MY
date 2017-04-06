<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>form</title>
</head>
<body>
<ul>
    <li><a href="index.php">На главную</a></li>
    <li><a href="next_file.php">Запрос мыла</a></li>
    <li><a href="form.php">На файл формы</a></li>
    <li><a href="quiz/index.php">quiz</a></li>
    <li><a href="belochonov_session.php">Первые 3 задания</a></li>
</ul>
<form action="form.php" method="post">
    <fieldset title="персональные данные">
        <legend>Ваши данные</legend>
        <br>
        <input type="text" title="Город" name="city" placeholder="город" />
        <br>
        <br>
        <input type="text" title="Возраст" name="age" placeholder="возраст" />
        <br>
        <br>
        <input type="submit" value="Отправить"/>
    </fieldset>
</form>

</body>
</html>

