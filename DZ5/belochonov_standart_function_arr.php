<?php
/*На count и range
1. Создайте массив, заполненный числами от 1 до 100.*/

$arr=[];
for ($i=1;$i<=100;$i++)
{
    $arr[]=$i;
}
print_r($arr);
/*2. Дан массив $arr. Подсчитайте количество элементов этого массива.*/

$count = count($arr);
echo $count;

/*3. Дан массив $arr. Выведите на экран первый и последний элемент данного массива.*/

echo reset($arr)."<br>";
echo end ($arr)."<br>";

/*На array_sum и array_product*/

/*4. Дан массив $arr. С помощью функций array_sum и count найдите среднее арифметическое элементов данного массива.*/

$sum=array_sum($arr);
$count=count($arr);
$rez= $sum/$count;
echo $rez;

/*5. Создайте массив, заполненный числами от 1 до 300. Найдите произведение элементов данного массива.*/


$arr=[];
for ($i=1;$i<=300;$i++)
{
    $arr[]=$i;
}
$proiv=array_product($arr);
echo $proiv;

/*На array_merge и array_slice*/

/*6. Даны два массива: первый с элементами '1', '2', '3', второй с элементами 'a', 'b', 'c'. Сделайте из них массив с элементами '1', '2', '3', 'a', 'b', 'c'.*/


$arr_numb=['1', '2', '3'];
$arr_abc=['a', 'b', 'c'];
$arr_new= array_merge($arr_numb,$arr_abc);
print_r($arr_new);

/*7. Даны массив с элементами '1', '2', '3', '4', '5'. С помощью функции array_slice создайте массив $b с элементами '2', '3', '4'.*/

$arr=['1', '2', '3', '4', '5'];
$output = array_slice($arr, -4, 3);
print_r($output);




/*На array_keys, array_values, array_combine*/

/*8. Дан массив 'green'=>'зеленый', 'blue'=>'голубой', 'red'=>'красный'. Запишите в массив $key английские названия цветов, а в $values – русские.*/

$arr=['green'=>'зеленый', 'blue'=>'голубой', 'red'=>'красный'];
$key=array_keys($arr);
$value=array_values($arr);
print_r($value)."<br>";
print_r($key)."<br>";


/*9. Даны два массива: 'green', 'blue', 'red' и ''зеленый', 'голубой', 'красный'. Создайте с их помощью массив 'green'=>'зеленый', 'blue'=>'голубой', 'red'=>'красный'. Используйте функцию array_combine.*/

$combine=array_combine($key,$value);
print_r($combine);


/*На array_flip, array_count_values, array_reverse, array_unique*/

/*10. Дан массив 'green'=>'зеленый', 'blue'=>'голубой', 'red'=>'красный'. Поменяйте местами ключи и значения.*/

$arr=['green'=>'зеленый', 'blue'=>'голубой', 'red'=>'красный'];

$arr_flip=array_flip($arr);
print_r($arr);
echo "<br>";
print_r ($arr_flip);
/*11. Дан массив с элементами '1', '2', '3', '4', '5'. Создайте массив с элементами '5', '4', '3', '2', '1'.*/

$arr=['1', '2', '3', '4', '5'];
$arrrev=array_reverse($arr);
print_r($arrrev);

/*12. Дан массив с элементами 'a', 'b', 'c', 'b', 'a'. Удалите из него повторяющиеся элементы.*/

$arr=['a', 'b', 'c', 'b', 'a'];
$rezult=array_unique($arr,SORT_STRING);
print_r($rezult);

/*13. Дан массив с элементами 'a', 'b', 'c', 'b', 'a'. Подсчитайте сколько раз встречается каждая из букв.*/

$arr=['a', 'b', 'c', 'b', 'a'];

$num=array_count_values($arr);
print_r($num);

/*На сортировку, shuffle и array_rand*/

/*14. Дан массив '3'=>'a', '1'=>'c', '2'=>'e', '4'=>'b'. Попробуйте на нем различные типы сортировок.*/

$arr=['3'=>'a', '1'=>'c', '2'=>'e', '4'=>'b'];
sort($arr);
print_r($arr);
ksort($arr);
print_r($arr);
print_r(asort($arr));
sort($arr);

/*15. Дан массив $arr. Перемешайте его элементы в случайном порядке.*/

$arr_sort=[1,2,3,4,5,6,7,8,9,10];
shuffle($arr_sort);
print_r($arr_sort);

/*16. Дан массив с элементами '1', '2', '3', '4', '5'. Выведите на экран случайный элемент данного масссива.*/

$arr=['1', '2', '3', '4', '5'];
$i=count($arr)-1;
$rand= rand(0,$i);
echo $arr[$rand];

/*На array_map и array_walk*/

/*17. Дан массив с элементами '1', '2', '3', '4', '5'. Создайте новый массив, в котором будут лежать квадратные корни данных элементов.*/

function SQRT_ARR($arr=[])
{
    settype($value,"int");
        $swrt=sqrt($arr[$value]);
    return $swrt;
}
$arr=['1', '2', '3', '4', '5'];
$new_arr=array_map('SQRT_ARR',$arr);
print_r($new_arr);


/*18. Дан массив с элементами '<b>php</b>', '<i>html</i>'. Создайте новый массив, в котором из элементов будут удалены теги.*/
function no_html($arr=[])
{

        return strip_tags($arr);

}
$array_html=['<b>php</b>', '<i>html</i>'];
$b=array_map('no_html',$array_html);
print_r($b);

echo "<br>";
echo "<br>";
echo "
/*19. Дан массив с элементами ' a ', ' b ', ' с '. Создайте новый массив, в котором будут данные элементы без концевых пробелов.*/"."<br>";

$arr=[' a ', ' b ', ' с '];
print_r($arr);
var_dump($arr);

$c=array_map('trim',$arr);
print_r($c);
var_dump($c);

echo "<br>";
echo "<br>";

/*На array_chunk и array_pad*/

/*20. Дан массив с элементами '1', '2', '3'. Сделайте из него массив с элементами '1', '2', '3', '0','0','0'.*/

$arr=['1', '2', '3'];
$count=count($arr);
$rezult=array_pad($arr,$count+$count,0);
print_r($rezult);


/*21. Создайте массив, заполненный целыми числами от 1 до 20. С помощью функции array_chunk разбейте этот массив на 5 подмассивов ('1', '2', '3', '4'; '5', '6', '7', '8' и т.д.).*/


$arr=[];
for ($i=1;$i<=20;$i++)
{
    $arr[]=$i;
}
$arr_chunk=array_chunk($arr,5);
print_r($arr_chunk);
