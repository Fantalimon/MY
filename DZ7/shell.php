<?php

function cookie_del($name)
{
    setcookie("$name",'',time()-1);
}

function saveCookie($name,$value)
{
    if (!isset($_COOKIE[$name])) {
        setcookie($name, $value);
    } else {
        setcookie($name, $value);
    }
}

function redirekt_cookie($name,$value)
{
    if (!isset($_COOKIE[$name])) {
        setcookie($name, $value);
    }else {setcookie($name,$value);}
}


$name='';
$value='';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>shell</title>
</head>
<body>
<h3><a href="index.php">Переход на страничку inex</a></h3>
<h3><a href="hello.php">Переход на страничку hello</a></h3>
<h3><a href="shell.php">Переход на страничку shell</a></h3>

<h4> Привет я оболочка, я управляю куками. </h4>

<form ​ action ​="shell.php" ​ method ​=" ​ GET ​ ">
   
    <fieldset title="Выберете куку и действие" >
        <legend>Выберете куку и действие</legend>
        <br>
        <br>
        <fieldset title="Введите имя куки">
            <legend>Удаление куки</legend>
        <input ​type="text" ​ name="del" placeholder="Удалить куку" value="<?php $name
        ?> " />
        </fieldset>
        <br>
       <fieldset title="Добавление куки">
           <legend> Добавлкеие куки </legend>
        <input title="Добавить имя куки" ​type="text" ​ name="redirect_name" placeholder="Добавить имя куки" value="" />
        <br>
        <br>
        <input title="Добавить значение куки" ​type="text" ​ name="redirect_value" placeholder="Добавить значение куки" value="" />
        <br>
        </fieldset>
        <br>
        <fieldset title="Изменение куки">
            <legend>Изменение куки</legend>
        <input title="Введите оригинальное имя куки " ​type="text" ​ name="save_name" placeholder="Изменить куки имя" value=" ">
            <br>
            <br>
        <input title="Введите значение куки " ​type="text" ​ name="save_value" placeholder="Изменить куки значение" value=" ">
        </fieldset>
         <br>
        <br>
        <br>
        <input type="submit" value="Выполнить">
    </fieldset>
</form>


</body>
</html>

<?php
$del = '';
if(!empty($_GET['del'])) {
    
    $del = empty($_GET['del']) ? '' : trim(strip_tags($_GET['del']));
    cookie_del($del);
}

$save_name= '';
$save_value= '';
if(!empty($_GET['save_name']) && !empty($_GET['save_value'])) {
    
    $save_name = empty($_GET['save_name']) ? '' : trim(strip_tags($_GET['save_name']));
    $save_value = empty($_GET['save_value']) ? '' : trim(strip_tags($_GET['save_value']));
    saveCookie($save_name,$save_value);
}

$redirect_name= '';
$redirect_value= '';
if(!empty($_GET['redirect_name']) && !empty($_GET['redirect_value'])) {
    
    $redirect_name = empty($_GET['redirect_name']) ? '' : trim(strip_tags($_GET['redirect_name']));
    $redirect_value = empty($_GET['redirect_value']) ? '' : trim(strip_tags($_GET['redirect_value']));
    redirekt_cookie($redirect_name,$redirect_value);
}

?>
