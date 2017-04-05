<?php

/*1. Создайте массив $arr=array('joomla', 'wordpress', 'netcat'). Выведите значение массива на экран с помощью команды var_dump().*/

$arr = array('joomla', 'wordpress', 'netcat');
echo "<pre>";
var_dump($arr);
echo "</pre>";

//---------------------------------------------------------------------------------------------------

/*2. С помощью массива $arr из предыдущего номера выведите на экран содержимое первого, второго и третьего элементов.*/

$arr = array('joomla', 'wordpress', 'netcat');
echo $arr[0] . "<br>";
echo $arr[1] . "<br>";
echo $arr[2] . "<br>";

//---------------------------------------------------------------------------------------------------

/*3. Создайте массив $arr=array('html', 'css', 'php') и с его помощью выведите на экран строку 'php, html, css'.*/

$arr = array('html', 'css', 'php');
echo $arr [2] . ",";
echo $arr [0] . ",";
echo $arr [1] . ".";

//-----------------------------------------------------------------------------------------------------

/*4. Создайте массив $arr с элементами 2, 5, 3, 9. Умножьте первый элемент массива на второй, а третий элемент на четвертый. Результаты сложите, присвойте переменной $result. Выведите на экран значение этой переменной.*/

$arr = array(2, 5, 3, 9);
$result = ($arr[0] * $arr[1]) + ($arr[2] * $arr[3]);
echo $result;

//---------------------------------------------------------------------------------------------------

/*5. Создайте массив $arr с элементами 'a', 'b', 'c', 78 двумя различными способами.*/

$arr = ['a', 'b', 'c', 78];
$arr = [];
$arr[0] = 'a';
$arr[1] = 'b';
$arr[2] = 'c';
$arr[3] = 78;

echo "<pre>";
var_dump($arr);
echo "</pre>";

//------------------------------------------------------------------------------------------------------

/*6. Создайте массив $arr с элементами 'Я', 'учу', 'PHP', '!'. С его помощью выведите на экран фразу 'Я учу PHP!'.*/

$arr = ['Я', 'учу', 'PHP', '!'];
$a = count($arr);
for ($i = 0; $i < $a; $i++) {
    echo $arr[$i] . ' ';
};


//-----------------------------------------------------------------------------------------------------

/*7. Создайте массив $arr=array('a', 'b', 'c', 'd', 'e'). С помощью одной переменной $var поменяйте местами элементы 'b' и 'c'.*/

$arr = array('a', 'b', 'c', 'd', 'e');

echo 'до' . var_dump($arr);
echo "<br>";
$var = $arr[2];
$arr[2] = $arr[1];
$arr[1] = $var;
echo "<br>";
echo 'после' . var_dump($arr);

//--------------------------------------------------------------------------------------------------------

/*8. Создайте массив $arr=array('a', 'b', 'c', 'd', 'e'). С помощью одной переменной $var сделайте из него массив array('e', 'd', 'c', 'b', 'a').*/

$arr = array('a', 'b', 'c', 'd', 'e');
$ctn = count($arr) - 1;
$var = [];

for ($j = 0, $i = $ctn; $i >= 0; $j++, $i--) {
    
    $var[$j] = $arr[$i];
    
}
print_r($var);
echo "<br>";
print_r($arr);


//------------------------------------------------------------------------------------------------------

/*9. Создайте массив $arr. Выведите значение массива на экран с помощью команды var_dump().*/

$arr = array('text' => 'текст!', 1 => '125', 'key' => 'element');
echo "<pre>";
var_dump($arr);
echo "</pre>";


//-------------------------------------------------------------------------------------------------------------------------


/*10. Создайте массив заработных плат $arr. Выведите на экран зарплату Пети и Коли.*/

$arr = array('Коля' => '1000$', 'Вася' => '500$', 'Петя' => '200$');

echo 'Петя =' . $arr['Петя'];
echo "<br>";
echo 'Коля =' . $arr['Коля'];

//------------------------------------------------------------------------------------------------------

/*11. Создайте массив $arr с ключами 'I', 'study', 'php', 'sign' и соответствующими элементами 'Я', 'учу', 'PHP', '!'. С его помощью выведите на экран фразу 'Я учу PHP!'.*/

$arr = [];
$arr['I'] = 'Я';
$arr['study'] = ' учу';
$arr['php'] = ' PHP';
$arr['sign'] = '!';

foreach ($arr as $value) {
    echo $value;
}

//-------------------------------------------------------------------------------------------------------------------------------


/*12. Создайте многомерный массив $arr. С его помощью выведите на экран слова 'joomla', 'drupal', 'зеленый', 'красный'.*/

$arr = array(
    'cms' => array('joomla', 'wordpress', 'drupal'),
    'colors' => array('blue' => 'голубой', 'red' => 'красный', 'green' => 'зеленый'),
);

echo $arr['cms'][0] . ' ';
echo $arr['cms'][2] . ' ' . "<br>";
echo $arr['colors']['green'] . ' ';
echo $arr['colors']['red'];


//-------------------------------------------------------------------------------------------------------------------------------

/*13. Создайте двумерный массив. Первые два ключа — это 'ru' и 'en'. Первый ключ содержит элемент, являющийся массивом названий дней недели по-русски, а второй — по-английски.*/

$arr = [];
$arr['en'] = array(1 => 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
$arr['ru'] = array(1 => 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье');
echo "<pre>";
var_dump($arr);
echo "</pre>";
//-------------------------------------------------------------------------------------------------------------------------------


/*14. Определите тип следующих переменных с помощью функции gettype().
Например:echo gettype($var)
Подробнее почитать о функции gettype() можно здесь http://www.softtime.ru/bookphp/gl1_5.php.*/
echo '<p style="font-size:18px;color:blue;">' . "Определение типа переменой через масив" . "</p>" . "<br>";
$var = [];
$var[] = ['joomla', 'wordpress', 'drupal'];
$var[] = 'привет!';
$var[] = 23;
$var[] = '23';
$var[] = true;
$var[] = 'true';
$var[] = 2.5;
$var[] = null;

foreach ($var as $key => $type) {
    echo "[$key]" . "\"$type\"". "~~~~~~~" . gettype($type) . "<br>";
};


?>
