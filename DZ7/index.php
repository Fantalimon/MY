<?php

$username = '';
$phone = '';
$age = mt_rand(10, 70);


if (!empty($_GET))
{
    $username = empty($_GET['username']) ? '' : trim(strip_tags($_GET['username']));
    $phone = empty($_GET['phone']) ? '' : trim(strip_tags($_GET['phone']));
    $username = empty($_GET['username']) ? '' : trim(strip_tags($_GET['username']));
}


setcookie('phone', $phone, time() + 3600, "DZ7");
setcookie('age', $age, time() + 3600 * 3, "DZ7");
setcookie('username', $username, time() + 3600 * 3, "DZ7");




    

/*saveCookie - функция получает имя и значение, проверяет имя в куках. Если кука есть - заменяет значени, если нет - создает имя и сетит значение.

get_Cookie - функция получает имя куки. Если кука есть - возвращает значение, если нет - возвращает false.

deleteCookie - функция получает имя куки. Если кука есть - удаляет ее.*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
</head>
<body>
<h3><a href="index.php">Переход на страничку inex</a></h3>
<h3><a href="hello.php">Переход на страничку hello</a></h3>
<h3><a href="shell.php">Переход на страничку shell</a></h3>

<form ​ action ​="index.php" ​ method ​=" ​ GET ​ ">
    <fieldset title="Ваше имя">
        <legend>Введите имя</legend>
        <input ​type="text" ​ name="username" placeholder=" ваше имя" />
        <br>
        <br>
        <input ​type="text" ​ name="phone" placeholder=" ваш телефон" />
        <br>
        <br>
        <input ​type="text" ​ name="birthday" placeholder="день рождения" />
        <br>
        <br>
        <input type="submit" value="Отправить ваш вариант" />
    </fieldset>
</form>


</body>
</html>


<?php

$birthday = '';
if(!empty($_GET['birthday'])) {

    $birthday = empty($_GET['birthday']) ? '' : trim(strip_tags($_GET['birthday']));
    setcookie('birthday', $birthday, time() + 31536000.00042889);
}

if (isset($_COOKIE["birthday"]))
{
        $birthday = $_COOKIE["birthday"];
        $year = date('Y', time());
        $month = date('m', strtotime($birthday));
        $day = date('d', strtotime($birthday));
        $check = ceil((mktime(0, 0, 0, $month, $day, $year) - time()) / (86400));
        
        if ($check == 0) {
            echo 'Поздравляем с Днем рождения!';
        } elseif ($check >= 1) {
            echo 'До вашего дня рождения: '.$check." дней.";
        }
        else{
            echo 'День рождения был, '.abs($check)." дней назад.";
        }
}

?>
