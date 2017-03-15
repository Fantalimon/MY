<?php

/*function save_cookie ($value)
{
    $value = setcookie('',$value,time()+31536000);
    return $value;
}

function cookie_del($value)
{
    unset ($value);
    return;
}

function cookie_redireckt($name,$time=3600,$path="/",$domain=false,$secure=true,$http=false)
{
   if(isset($_COOKIE["$name"]))
   {
    $name=(string)$name;
    $value="$".$name;
    $time=(int)$time;
    $newname=setcookie($name,$value,$time,$path,$domain,$secure,$http);
   }
    return $newname;
}*/


$username = '';
$phone = '';
$age = mt_rand(10, 70);


if (!empty($_GET))
{
    $username = empty($_GET['username']) ? '' : trim(strip_tags($_GET['username']));
    $phone = empty($_GET['phone']) ? '' : trim(strip_tags($_GET['phone']));
}



setcookie('username', $username, time() + 3600, "DZ7");
setcookie('phone', $phone, time() + 3600, "DZ7");
setcookie('age', $age, time() + 3600 * 3, "DZ7");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
</head>
<body>
<h3><a href="hello.php">Переход на страничку hello</a></h3>

<form ​ action ​="index.php" ​ method ​=" ​ GET ​ ">
    <fieldset title="Ваше имя">
        <legend>Введите имя</legend>
        <input ​type="text" ​ name="username" placeholder=" ваше имя">
        <br>
        <br>
        <input ​type="text" ​ name="phone" placeholder=" ваш телефон">
        <br>
        <br>
        <input ​type="text" ​ name="berthday" placeholder="День рождения у вас когда?">
        <br>
        <br>
        <input type="submit" value="Отправить ваш вариант">
    </fieldset>
</form>


</body>
</html>


<?php

$berthday = '';

if(!empty($_GET['berthday'])) {
    $berthday = empty($_GET['berthday']) ? '' : trim(strip_tags($_GET['berthday']));
    setcookie('bertnday', $berthday, time() + 31536000.00042889, "DZ7");
}
if(isset($berthday)) {
    
$berthday = strtotime($berthday);
    $difference = time() - $berthday;
    $year = ($difference % 31536000.00042889);
    $rez = (31536000.00042889 - $year);
    $rezult_day = floor($rez / 86400);
    
        if ($rezult_day == 364 || $difference==false)
        {
            echo "<h1 style='color:red'>Поздравляем У вас сегодня день варенья!</h1>";
        }
        else
        {
            echo "Вам до дня рождения осталось, $rezult_day дней.";
        }
}


?>
