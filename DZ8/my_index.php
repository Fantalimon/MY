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

