<?php
session_start();

$email='';
if(!empty($_POST)) {
    if(isset($_POST['email']))
    {
        $email=strip_tags(trim($_POST['email']));
        $_SESSION['email']=$email;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>form</title>
</head>
<body>
<form>
    <fieldset title="персональные данные">
        <legend>Ваши данные</legend>
     <br>
     <input type="text" title="имя" name="name" placeholder="имя" />
    <br>
    <br>
    <input type="text" title="фамилия" name="seurname" placeholder="фамилия" />
    <br>
    <br>
    <input type="text" title="отчество" name="patronymic" placeholder="отчество" />
    <br>
    <br>
    <input type="text" title="почта" name="email" placeholder="ваша почта" value="<?php echo $email ?>" />
    <br>
    <br>
    </fieldset>
</form>

</body>
</html>

