<?php

$login = 'login';
$pass = 'pass';

if (($_SERVER['PHP_AUTH_PW'] != $pass || $_SERVER['PHP_AUTH_USER'] != $login) || !$_SERVER['PHP_AUTH_USER']) {
    header('WWW-Authenticate: Basic realm="Test auth"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Вы не афторизированны';
    exit;
}

/*Создайте html-форму. Сделайте на форме два поля ввода Date 1 и Date 2. Через поля ввода будут передаваться даты в формате 'год-месяц-день'.
Добавьте на форму два элемента типа radio. Задайте элементы label для этих кнопок: dd.mm.YY и YY.mm.dd соответственно. Радио кнопки будут отвечать за формат даты, в котором будут выводится даты пользователю на экран.
Данные, которые передаются формой либо через адресную строку, необходимо проверять на корректность (валидировать) на сервере. Валидацию можно проводить единожды и затем использовать для решения задач.
По клику на кнопку sumbit вам необходимо выполнить следующие задачи:*/


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My form</title>
</head>
<body>
<form action="belochonov_form.php" method="get">
    <p>Введите дату</p>
    <input name="date1"/><br>
    <br>
    <input name="date2"/><br>
    <br>
    <input type="radio" checked id="dmY"/><label>день месц Год</label>
    <br>
    <input type="radio" id="Ymd"/><label>Год месяц день</label>
    <br>
    <br>
    <input type="submit"/>

</form>
</body>
</html>


<?php
$date1 = '';
$date2 = '';
if (!empty($_GET)) {
    $date1 = empty($_GET['date1']) ? '' : trim(strip_tags($_GET['date1']));
}

if (!empty($_GET)) {
    $date2 = empty($_GET['date2']) ? '' : trim(strip_tags($_GET['date2']));
}

echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
/*1. Пользователь вводит число, а скрипт определяет високосный ли год. Сделать проверку на формат и количество введенных значений. Если есть ошибка - уведомить об этом пользователя.*/

$date1 = (integer) $date1;
$date2 = (integer) $date2;
if ($date1 % 4) {
    echo "$date1 Не высокосный год";
} else {
    echo "Вы вели $date1 и это высокосный год";
}
echo "<br>";
if ($date2 % 4) {
    echo "$date2 Не высокосный год";
} else {
    echo "Вы вели $date2 и это высокосный год";
}

echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
/*2. Пользователь передает две даты. Первую дату запишите в переменную $date1, а вторую в $date2. Сравните, какая из введенных дат больше. С помощью функций explode и mktime переведите большую дату в формат timestamp. По этому timestamp узнайте день недели (словом, латиницей) и выведите его на экран.*/

if (!empty($date1) && !empty($date2)) {
    $date_one = strtotime($date1);
    $date_too = strtotime($date2);
    if ($date_one <= $date_too) {
        list($d, $m, $Y) = explode(".", $date1);
        $timestemp1 = mktime(0, 0, 0, $m, $d, $Y);
        $month1 = date("F", $timestemp1);
        echo $month1;
    } else {
        list($d, $m, $Y) = explode(".", $date2);
        $timestemp2 = mktime(0, 0, 0, $m, $d, $Y);
        $month2 = date("F", $timestemp2);
        echo $month2;
    }
    echo "<br>";
} else {
    echo "Введите даты";
}

echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
/*3. В поле вводится дата. Прибавьте к этой дате 1 год 2 месяца и 3 дня. Отнимите от этой даты 5 дней. Результат преобразуйте ее в выбранный формат и отобразите на экране.*/

$date1 = strtotime($date1);
$small_date = mktime(0, 0, 0, 2, 3, 1);
$big_date = $date1 + $small_date;
$fiveday = mktime(0, 0, 0, 0, 5, 0);
$ALLDATE = $big_date - $fiveday;
$end_date = date("d.m.Y", $ALLDATE);
echo $end_date;

echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
/*4. С помощью адресной строки передайте GET-параметр date, который хранит год (4 числа). Посчитайте сколько воскресений в введенном году приходится на первое число месяца.*/

$date1 = (string) $date1;
$len = strlen($date1);
if ($len != 4) {
    echo "Вы вводите слишком большую дату";
} else {
    $count = 0;
    for ($month = 1; $month < 13; $month++) {
        if (date("N", mktime(0, 0, 0, $month, 1, $date1)) == 7) {
            $count++;
        }
    }
}
$count='';
if ($count == 0) {
    echo "Воскресений небыло в первый день каждого месяца";
} else {
    echo "Вот столко воскресений в первое число каждого месяца : " . $count;
}

echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
/*5. С помощью адресной строки передайте GET-параметр date, который хранит год (4 числа). Найдите все пятницы 13-е в этом году. Результат выведите в виде списка дат.*/

$date1 = (string) $date1;
$len = strlen($date1);
if ($len != 4) {
    echo "Вы вводите слишком большую дату";
} else {
    $count = 0;
    for ($month = 1; $month < 13; $month++) {
        if (date("N", mktime(0, 0, 0, $month, 13, $date1)) == 5) {
            $count++;
            echo "Пятница 13 есть в " . date("F", mktime(0, 0, 0, $month, 13, $date1)) . "<br>";
        }
    }
}
if ($count == 0) {
    echo "Нет пятниц 13 тых";
} else {
    echo "Вот столко пятниц 13 в $date1 : " . $count;
}


echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
/*6. Дан GET-параметр date, в который вводится год. Узнайте, какой это будет год по восточному календарю. Результат выведите на экран.*/

$date1 = (int) $date1;
$year_cin =
    ["Крыса", "Бык", "Тигр", "Кролик", "Дракон", "Змея", "Лошадь", "Коза", "Обезьяна", "Петух", "Собака", "Свинья"];

$begin_date = 1900;
$time_now = $date1;
$finde_key_number = $time_now - $begin_date;
$key = $finde_key_number % 12;
$value = $year_cin[$key];
$animal_year = $value;
echo $animal_year;


echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
/*7. Пользователь в форму вводит дату, например, 2017-01-01. Найдите количество дней, часов, минут, секунд, прошедших с 2017-01-01 23:59:59 до настоящего момента.*/

$date1 = strtotime($date1);

$date_now = time();
$timestemp = $date_now - $date1;

$s = $timestemp % 60;
$m = floor(($timestemp % 3600) / 60);
$H = floor(($timestemp % 86400) / 3600);
$D = floor($timestemp / 86400);

echo "$D дней" . " " . "$H часов" . " " . "$m минут" . " " . "$s секунд";


echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
/*8. Пользователь в форму вводит дату. Узнайте какой день недели был 100 лет назад.*/

$date1 = strtotime($date1);
$hundryt_year_ago = $date1 - time(100);
echo date("l", $hundryt_year_ago);

echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
/*9. Создайте html-форму. Добавьте на форму 4 элемента с типом checkbox, сгруппированных с помощью элемента fieldset. Чекбоксы должны иметь названия: html, css, php, javascript. Названия чекбоксам задаются с помощью элемента label. Спросите у пользователя, какие из языков он знает: html, css, php, javascript. Выведите на экран те языки, которые знает пользователь. Если пользователь не отметил ни один язык — выведите на экран сообщение об этом.*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>checkbox</title>
</head>
<body>
<form action="belochonov_form.php" method="get">
    <fieldset title="Знание языков">
        <legend>Какие вы знаете языки?</legend>
        <br>
        <input type="checkbox" name="html"><label>html</label>
        <br>
        <input type="checkbox" name="css"><label>css</label>
        <br>
        <input autofocus="autofocus" type="checkbox" name="php"><label>php</label>
        <br>
        <input type="checkbox" name="js"><label>javascript</label>
        <br><br><br>
        <input type="submit" value="Отправить ваш вариант">
    </fieldset>

</form>
</body>
</html>

<?php
$css = $html = $php = $js = '';
if (!empty($_GET)) {
    $html = empty($_GET['html']) ? '' : trim(strip_tags($_GET['html']));
    $css = empty($_GET['css']) ? '' : trim(strip_tags($_GET['css']));
    $php = empty($_GET['php']) ? '' : trim(strip_tags($_GET['php']));
    $js = empty($_GET['js']) ? '' : trim(strip_tags($_GET['js']));

} else {
    echo "Вы не выбрли ни одного языка" . "<br>";
}
if ($html == "on") {
    echo "Вы знаете html" . "<br>";
}
if ($css == "on") {
    echo "Вы знаете CSS" . "<br>";
}
if ($php == "on") {
    echo "Вы знаете php" . "<br>";
}
if ($js == "on") {
    echo "Вы знаете js" . "<br>";
}
echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
?>


<?php
/*10. Создайте html-форму. Спросите у пользователя знает ли он PHP с помощью двух radio-кнопок. Выведите результат на экран. Сделайте так, чтобы по умолчанию один из вариантов был уже отмечен.*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ratio php</title>
</head>
<body>
<form action="belochonov_form.php" method="get">
    <fieldset title="Знание php">
        <legend>Знаете ли вы PHP ?</legend>
        <br>
        <input autofocus="autofocus" type="checkbox" checked name="yes"><label>ДА</label>
        <br>
        <input type="checkbox" name="no"><label>НЕТ</label>
        <br><br><br>
        <input type="submit" value="Отправить ваш вариант">
    </fieldset>

</form>
</body>
</html>

<?php
$no = $yes = '';
if (!empty($_GET)) {
    $no = empty($_GET['no']) ? '' : trim(strip_tags($_GET['no']));
    $yes = empty($_GET['yes']) ? '' : trim(strip_tags($_GET['yes']));
}
if ($no == true) {
    echo "Вы не знаете php" . "<br>";
} else {
    echo "Вы знаете php" . "<br>";
}
echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
?>



<?php

/*11. Создайте html-форму. Спросите у пользователя его возраст с помощью нескольких radio-кнопок, сгруппированных элементом fieldset. Варианты ответа сделайте такими: менее 20 лет, 20-25, 26-30, более 30. Результат выдайте на экран в видет “Ваш возраст в диапазоне <n> лет”.*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>checkbox</title>
</head>
<body>
<form action="belochonov_form.php" method="get">
    <fieldset title="Сколько вам лет?">
        <legend>Сколько вам лет?</legend>
        <br>
        <input type="radio" name="age20"><label>20</label>
        <br>
        <input type="radio" name="age20_25"><label>20-25</label>
        <br>
        <input type="radio" name="age26_30"><label>26-30</label>
        <br>
        <input type="radio" name="age_more30"><label>больше 30</label>
        <br><br><br>
        <input type="submit" value="Отправить ваш вариант">
    </fieldset>

</form>
</body>
</html>

<?php
$age20 = $age20_25 = $age26_30 = $age_more30 = '';
if (!empty($_GET)) {
    $age20 = empty($_GET['age20']) ? '' : trim(strip_tags($_GET['age20']));
    $age20_25 = empty($_GET['age20_25']) ? '' : trim(strip_tags($_GET['age20_25']));
    $age26_30 = empty($_GET['age26_30']) ? '' : trim(strip_tags($_GET['age26_30']));
    $age_more30 = empty($_GET['age_more30']) ? '' : trim(strip_tags($_GET['age_more30']));
}


if (($age20 || $age20_25 || $age26_30 || $age_more30) == "on") {
    $arr = [$age20 => "20", $age20_25 => "20-25", $age26_30 => "26-30", $age_more30 => "30 или больше"];
    $n = " ";
    foreach ($arr as $key => $value) {
        $n = $arr["on"];
    }
    echo "вам где-то $n лет" . "<br>";
}
echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
?>




<?php
/*12. Создайте html-форму. Спросите у пользователя его возраст с помощью select. Варианты ответа сделайте такими: менее 20 лет, 20-25, 26-30, более 30.*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>checkbox</title>
</head>
<body>
<form action="belochonov_form.php" method="get">
    <fieldset title="сколько вам лет">
        <legend>Сколько вам лет?</legend>
        <br>
        <select>
            <option value="age_20">20 лет</option>
            <option value="age_20_25">20-25 лет</option>
            <option value="age_26_30">26-30 лет</option>
            <option value="age_more_30">больше 30 лет</option>
        </select>
        <br><br><br>
        <input type="submit" value="Отправить ваш вариант">
    </fieldset>

</form>
</body>
</html>
<?php
echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
/*13. Создайте html-форму. Спросите у пользователя с помощью элемента multiselect, какие из языков он знает: html, css, php, javascript. Выведите на экран те языки, которые знает пользователь.*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SELECT</title>
</head>
<body>
<form action="belochonov_form.php" method="get">
    <fieldset title="выбирая зажимайте CTRL">
        <legend>Выберете языки которые вы знаете?</legend>
        <br>
        <select multiple="multiple">
            <option value="html">HTML</option>
            <option value="css">CSS</option>
            <option value="php">PHP</option>
            <option value="js">javascript</option>
        </select>
        <br><br><br>
        <input type="submit" value="Отправить ваш вариант">
    </fieldset>

</form>
</body>
</html>


<?php
echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
/*14. Сделайте функцию, которая создаёт html элемент. Функция должна иметь следующие параметры: type, name, value, placeholder. В функцию на вход может попасть только input или textarea. В любом другом случае необходимо вывести предупреждение об ошибке.*/

function html_grate($input, $textarea)
{
    if ($input == 1) {
        echo "<input type=\"\" name=\"\" value=\"\" placeholder=\"som text enter\">";
    }
    if ($textarea == 1) {
        echo "<textarea type=\"\" name=\"\" value=\"\" placeholder=\"som text enter\">som text write hear</textarea>";
    }

    return;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>function html elem</title>
</head>
<body>
<form action="belochonov_form.php" method="get">
    <?php echo html_grate(1, 1) ?>
</form>
</body>
</html>


<?php
echo"<br>";
echo"<br>";
echo"<br>";
echo "****************************************************************************";
echo"<br>";
echo"<br>";
echo"<br>";
/*15. Сделайте функцию, которая будет создавать селект. Функция должна принимать многомерный массив, например:
$arr = array(
    0=>array('value'=>'php', 'text'=>'Язык PHP'),
    1=>array('value'=>'html', 'text'=>'Язык HTML'),
)*/
$arr = array(0 => array('value' => 'php', 'text' => 'Язык PHP'), 1 => array('value' => 'html', 'text' => 'Язык HTML'));
function select($arr)
{
    echo "<select>";
    $arr_value = '';
    $arr_text = '';
    foreach ($arr as $value) {
        $arr_text = $value['text'];
        $arr_value = $value['value'];
        echo "<option value=\"$arr_value\" >$arr_text</option>";
    }
    echo "</select>";

    return;
}

select($arr);


?>
