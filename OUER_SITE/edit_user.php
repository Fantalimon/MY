<?php
$user_id=trim(strip_tags( $_GET['user_id']));
$username=trim(strip_tags( $_GET['username']));
$email=trim(strip_tags( $_GET['email']));
$password=trim(strip_tags( $_GET['password']));

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
        <input type="text" title="имя" name="username" placeholder="имя" value="<?php echo $username ?>" />
        <br>
        <br>
        <input type="text" title="почта" name="email" placeholder="ваша почта" value="<?php echo $email ?>" />
        <input type="hidden"  name="user_id"  value="<?php echo $user_id ?>" />
        <br>
        <br>
        <input type="text" title="пароль" name="password" placeholder="пароль" value="<?php echo  $password ?>" />
        <br>
        <br>
        <input type="submit" name="sub_edit" value="отправить новые данные" />
    </fieldset>
</form>

</body>
</html>


