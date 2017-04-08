<?php

$username='dima';
$email;
$password;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Изменение Данных</title>
</head>
<body>

<form action="edit.php" method="post">
    <fieldset title="персональные данные">
        <legend>Ваши данные <?php ?></legend>
        <br>
        <input type="text" title="имя" name="username" placeholder="имя" value="<?php $username ?>" />
        <br>
        <br>
        <input type="text" title="почта" name="email" placeholder="ваша почта" value="<?php $email ?>" />
        <br>
        <br>
        <input type="text" title="пароль" name="password" placeholder="пароль" value="<?php $password ?>" />
        <br>
        <br>
        <input type="submit" name="sub_edit" value="отправить новые данные" />
    </fieldset>
</form>

</body>
</html>


