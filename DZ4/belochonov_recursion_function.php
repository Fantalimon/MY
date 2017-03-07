<?php
//header("Refresh: 5");
/**
 * @return   array ($arr)  Случайный массив разной ,длинны от 5 до 15, со случайными значениями от 1 до 20 и выводит его на экран
 */

function som_array()
{
    $arr=[];
    $arr_l=rand(5,15);
    for($i=1;$i<=$arr_l;$i++)
    {
      echo  $arr[$i]=rand(0,20).' ';
    }
//    print_r($arr);
    return $arr;
}

/**Функция генерирует случайный набор Латинских символов включая верхний регистр, и цифры от 0 до 9.
 * @return $generate_string - возвращает сгенерированную строку.
 * $length - отвечает за длинну которая, тоже случайна и равна 5>=25.
 * $chars - переменная отвечающая за алфавит.
 *
 *
 */
//function som_str()
//{
//    $chars = 'abdefhiknrstyz_ABDEFGHKNQRSTYZ0123456789-';
//    $generate_string='';
//    $length=rand(10,25);
//
//    for($x=0; $x < $length; $x++)
//    {
//        $i=rand(0,40);
//        $generate_string.=$chars{$i};
//
//    }
//
//
//return $generate_string;
//}
//echo som_str();
//echo "<br>";
//
//
///*1. Дан массив с произвольными числами. Сделайте так, чтобы элемент
//повторился в массиве количество раз, соответствующее его числу.
//Пример: ​ array(1, 3, 2, 4)​ превратится в ​ array(1, 3, 3, 3, 2, 2, 4, 4, 4,4)​*/
//
//
//function bigest_massiv_his_number($arr=array(1,2,3,4,5))
//{
//
//    $big_mass=[];
//    foreach ($arr as $value)
//    {
//
//
//        for($x=1;$x<=$value;$x++)
//        {
//            $big_mass[]=$value."<br>";
//        }
//
//    }
//    print_r($arr);
//    echo "<br>";
//    print_r($big_mass);
//    return;
//
//}
//$arr=som_array();
//echo "<br>";echo "<br>";echo "<br>";
//bigest_massiv_his_number($arr);
//echo "<br>";echo "<br>";
//
//
//
///*2. Дан массив с произвольными целыми числами. Сделайте так, чтобы
//первый элемент стал ключом второго элемента, третий элемент -
//ключом четвертого и так далее. Пример: array(1, 2, 3, 4, 5, 6) превратится в ​ array(1=>2, 3=>4, 5=>6)​ .*/

//function key_next_value($arr = array(1,2,6,5,10,8))
//{
//    if (count($arr) % 2 == 0) {
//        $ctn = count($arr)-1;
//        $mini_mass = [];
//        $key = '';
//        $value = '';
//
//        for($i=1;$i<=$ctn;$i++)
//        {
//            if ($i%2 == true)
//            {
//                $mass_paryty_element=$arr[$i];
//                $key = $mass_paryty_element;
//            }
//            else {
//                $mass_noparyty_element=$arr[$i];
//                $value = $mass_noparyty_element;
//            }
//            $mini_mass[$key]=$value;
//        }
//
//
//
//        return $mini_mass;
//    }
//    else
//    {   echo "<br>";
//        echo "<b>Массив нечётной длинны! Дайте мне массив чётной длинны!</b>";
//    }
//}
//echo "<br>";echo "<br>";
//$arr=som_array();
//echo "<br>";
//key_next_value();
//print_r (key_next_value($arr));
//echo "<br>";echo "<br>";


///*3. Дана строка. Удалите из этой строки четные символы.*/
//
//
//function str_date($str = 'a2b4c6d8')
//{
//    var_dump($str);
//    $ctn=strlen($str)-1;
//  for($i=0;$i<=$ctn; $i++)
//    {
//        if($i%2==false)
//        {
//          echo  $str{$i};
//        }
//    }
//}
//echo "<br>";echo "<br>";
//$del_=som_str();
//echo $del_;
//str_date($del_);
//
//echo "<br>";echo "<br>";
//
//
///*4. Дана строка. Поменяйте ее первый символ на второй и наоборот,
//третий на четвертый и наоборот, пятый на шестой и наоборот и так
//    далее. То есть из строки ' ​ 12345678'​ нужно сделать ' ​ 21436587'​ .*/
//
//echo "<br>";echo "<br>";
//function str_next_reverse($str = "1a2b3c4d")
//{
//    $length=strlen($str)-1;
//   $pairword='';
//    for($i=0,$y=0;$y<=$length;$i=$y++)
//     {
//
//          if($y%2 == true)
//           {
//              echo  $pairword = $str{$y}.$str{$i}; //Не могу понять как вывести это выражение как бы в цикле с ретёрном?
//           }
//
//      }
//}
//$word=som_str();
//echo $word;
//echo "<br>";
//str_next_reverse($word);
//echo "<br>";echo "<br>";
//
//
//
//
///*5. Напишите функцию, которой в параметре массив из случайных чисел. Функция возвращает массив из
//    уникальных (не повторяющихся) значений (аналог функции array_unique).*/

//echo "<br>";echo "<br>";
//
//function tru_false($sort, array $temp)
//{
//    foreach ($temp as $sortyg){
//
//        if($sort == $sortyg )
//            return true;
//    }
//    return false;
//}
//
//
//function analog_array_unique ($arry = [1,1,2,3,4,2,5])
//{   print_r($arry);
//echo "<br>";
//    $arry2=[];
//    foreach ($arry as $key=>$value)
//    {
//            if (tru_false($value,$arry2))
//             {unset($arry[$key]);}
//            else    { $arry2[] = $value;}
//    }
//    print_r($arry2);
//}
//analog_array_unique();
//echo "<br>";echo "<br>";


/*6. Напишите функцию, которая будет противоположной array_unique, т.е.
    будет оставлять дубликаты, но удалять не повторяющиеся значения.*/

echo "<br>";echo "<br>";
function anti_array_unique ($arry = [1,1,2,3,4,2,5])
{
    $arr_new=[];
    $count=count($arry)-1;
    foreach ($arry as $key=>$value)
    {
        $copy_plus=0;
        for($i=1;$i<=$count;$i++)
        {
            if ($value==$arry[$i]) $copy_plus++;
        }
    if($copy_plus>1) $arr_new[]=$value;
    }
    return $arr_new;
}
$masskarad=som_array();
echo "<br>";
print_r(anti_array_unique($masskarad));
echo "<br>";echo "<br>";

///*7. Напишите функцию, которой передается фамилия имя и отчество, а
//    функция возвращает фамилию и инициалы. Например, передаем
//    Ivanov Ivan Ivanovich и нам выводит: Ivanov I. I.*/
//
//function name_low ($sername,  $name, $patronymic)
//{   gettype($sername);gettype($name);gettype($patronymic);
//    if ($sername!==(string)$sername){
//        echo "Неправильн введена фамилия"."<br>";
//        exit;
//    }
//
//    if ($name!==(string)$name){
//        echo"Неправльино введено Имя"."<br>";
//        exit ;
//    }
//
//    if ($patronymic!==(string)$patronymic){
//        echo "Неправильно введено отчество"."<br>";
//        exit ;
//    }
//    else
//    {
//        echo "Спасибо за регистрацию.";
//        echo "<br>";
//        $name=$name{0}.'.';
//        $patronymic=$patronymic{0}.'.';
//
//        return $sername.' '.$name.' '.$patronymic."<br>";
//    }
//}
//echo "<br>";echo "<br>";
//$sername="Belochonov";
//$name="Dima";
//$patronymic="Alecsandrivich";
//echo name_low($sername, $name, $patronymic);
//
//echo "<br>";echo "<br>";
//
///*8. (​ +1​ ) Таблица умножения. Напишите функцию, которая принимает на
//вход два параметра: количество строк и количество колонок. Функция
//возвращает​ (​ не выводит на экран!​ ) таблицу умножения вида
//http://joxi.ru/brR577kiJJNRXA​ . Можно использовать table или div теги
//html. Цвет перемножаемых колонок и строк можете задать отдельным
//    третьим параметром в виде ​ hex-кода цвета​ .*/
//
//echo "<br>";echo "<br>";
//
//function XtableY ($X = 25, $Y = 25 )
//{
//    $table="<table border='1px' width='100%'>";
//    for($x=1;$x<=$X;$x++)
//    {
//        $table.= "<tr>";
//        for ($y=1;$y<=$Y;$y++)
//        {  if($x===1 || $y===1)
//        {$table.= "<td style='background-color: crimson; font-size: 14px; margin:3px 3px; padding: 5px 5px; text-align: center;'>
//".$x*$y."</td>";}
//        else{$table.= "<td style='background-color: antiquewhite; font: italic bold 12px/1 Georgia,serif;margin:3px 3px; padding: 5px 5px; text-align: center;'>".$x*$y."</td>";}
//        }
//        $table.= "</tr>";
//    }
//    $table.= "</table>";
//    return $table;
//}
//$X=rand(5,25);
//$Y=rand(3,15);
//echo XtableY($X,$Y);
//echo "<br>";echo "<br>";
//
//
//
///*9. (​ +1​ ) Написать ​ рекурсивную функцию​ , которая на вход получает число
//    и вычисляет и ​ возвращает​ значение факториала этого числа.*/
//
//function factorial($n=5)
//{
//    if ($n==0)return 1;
//
// return $n*factorial($n-1);
//
//}
//echo "<br>";echo "<br>";
//$fac=rand(5,25);
//echo factorial($fac);
//echo "<br>";echo "<br>";
//
//
//
///*10.(​ +1​ ) Написать функцию (рекурсивную либо обычную - по желанию),
//которая принимает на вход параметр (например, $n) и вычисляет
//число Фибоначчи до предела $n. Результат вычисления возвращается
//    этой же функцией.*/
//
//
//function fibonachi($n = 15)
//{
//    $a=0;
//    $b=1;
//    $fibo=0;
//    for($i=0;$i<=$n;$i++)
//    {
//        $fibo=$a+$b;
//        $a=$b;
//        $b=$fibo;
//    }
//    return $fibo;
//}
//echo "<br>";echo "<br>";
//$fib=rand(5,250);
//echo fibonachi();
//echo "<br>";echo "<br>";
//
//
///*11.(​ +1​ ) Напишите ​ рекурсивную функцию​ , принимающую на вход
//натуральное число $n. Функция возвращает строку из всех чисел от 1
//до $n либо от $n до 1. За порядок сортировки должен отвечать
//дополнительный параметр функции - $order, который может
//принимать значение ‘desc’ (убывающий) или ‘asc’ (возрастающий) и по-умолчанию должен быть равен ‘desc’.*/
//
//function number_string ($n = 5, $order = 'desc', $boom='')
//{
//
//if ($order==='asc')
//{
//   $boom=$n . $boom;
//}
//elseif ($order==='desc')
//{
//    $boom.=$n;
//}
//if ($n==1)
//{
//    return $boom;
//}
//else
//{
//    return number_string($n-1,$order,$boom);
//}
//
//
//}
//echo "<br>";echo "<br>";
//$numstr=rand(3,123);
//echo number_string($numstr);
//echo "<br>";echo "<br>";
//
//
///*12.Напишите функцию, которая подсчитывает количество всех значений массива. Функция должна учитывать вложенность массивов. (функцией  пользоваться нельзя).*/
//
//function my_array_count_values($arr = [1,1,1,1,[1,1,5,5,5,5,5],[123,1,2,4,5,6,7,8,9,0,1,1,1,1],5])
//{
//
//    $arr_return=[];
//
//    foreach ($arr as $value)
//    {
//        if (is_array($value))
//        {
//            my_array_count_values($value);
//        }
//          else
//          {  if (isset($arr_return[$value]))
//             {
//                 $arr_return[$value]+=1;
//
//              }
//             else
//             {
//              $arr_return[$value]=1;
//             }
//          }
//    }
//
//
//
//    echo "<br>";
//    print_r($arr_return);
//}
////$getmy_mass=som_array();
//my_array_count_values();
//echo "<br>";echo "<br>";

?>


