<?php
/*1. Создайте переменную $a и присвойте ей значение 3. Выведите значение этой переменной на экран.*/
//$a=3;
//echo $a;
//----------------------------------------------------------------------------------------------------


/*2. Создайте переменные $a=10 и $b=2. Выведите на экран их сумму, разность, произведение и частное (результат деления).*/

//$a=10;
//$b=2;
//echo $a+$b."<br>";
//echo $a-$b."<br>";
//echo $a/$b."<br>";
//----------------------------------------------------------------------------------------------------


/*3. Создайте переменные $c=15 и $d=2. Просуммируйте их, а результат присвойте переменной $result. Выведите на экран значение переменной $result.*/

//$c=15;
//$d=2;
//echo $result = $c+$d;
//---------------------------------------------------------------------------------------------------

/*4. Создайте переменные $a=10, $b=2 и $c=5. Выведите на экран их сумму.*/
//
//$a=10;
//$b=2;
//$c=5;
//echo $a+$b+$c;
//--------------------------------------------------------------------------------------------------

/*5. Создайте переменные $a=17 и $b=10. Отнимите от $a переменную $b и результат присвойте переменной $с. Затем создайте переменную $d, присвойте ей значение 7. Сложите переменные. Выведите результат на экран.*/

//$a=17;
//$b=10;
//$c=$a-$b;
//$d=7;
//echo $c+$d;
//---------------------------------------------------------------------------------------------------

/*6. Создайте переменную $text и присвойте ей значение 'Привет, Мир!'. Выведите значение этой переменной на экран.*/

//$text='Привет, Мир!';
//echo $text;
//---------------------------------------------------------------------------------------------------


/*7. Создайте переменные $text1='Привет, ' и $text2='Мир!'. С помощью этих переменных и операции сложения строк выведите на экран фразу Привет, Мир!'.
p.s. под результатом сложения подразумевается возможность конкатенации строк с помощью знака +. Например:
$var = “Hello” + “ world!”; // в переменной $var будет Hello world
Это альтернатива следующему выражению:
 $var = “Hello” . “ world”; // в переменной $var будет Hello world*/

//echo $text1='Привет, '.$text2='Мир!';

//-----------------------------------------------------------------------------------------------------

/*8. Создайте переменную $text и присвойте ей значение 'Мама мыла раму!'. Выведите символы: ы, м, а, у, ! всеми возможными способами.*/

////$mytext = 'mama mila ramu';
////echo strlen($mytext);// а тут 14 символов
////echo "<br>";
//$mytext2 = 'мама мыла раму!';
////echo strlen($mytext2);// в 7 версии php очень непонятно считает длинну строки. ёё если писать по русски 27 штук)
////echo "<br>";
////echo mb_strlen($mytext2); // а это правильно считает 
////echo"<br>";
//echo iconv_strlen ($mytext2);// и эта функция правильно считает так как в различных кодировках символы кодируются различным колличеством байт. http://php.net/manual/ru/function.iconv-strlen.php
//echo "<br>";
//echo $a = mb_substr($mytext2, -1,1);
//echo "<br>";
//echo $b = mb_substr($mytext2, -2,1);
//echo "<br>";
//echo $c = mb_substr($mytext2, 1,1);
//echo "<br>";
//echo $d = mb_substr($mytext2, 5,1);
//echo "<br>";
//echo $e = mb_substr($mytext2, 6,1);
//echo "<br>";    

////print $a."<br>".$b."<br>".$c."<br>".$d."<br>".$e;
//---------------------------------------------------------------------------------------------------
/*9. Создайте переменную $game и присвойте ей значение 'Путешественник'. Обращаясь с этим словом как с отдельными символами составьте различные русские слова.*/
//
//$game = 'Путешественник';
//echo $putin = mb_substr($game, 0 , 1).mb_substr($game, 1,1).mb_substr($game,2,1).mb_substr($game,-2,1).mb_substr($game,-3,1)."<br>";
//echo $shest = mb_substr($game,4,1).mb_substr($game,5,1).mb_substr($game,6,1).mb_substr($game,7,1)."<br>";
//echo $tut = mb_substr($game,2,1).mb_substr($game,1,1).mb_substr($game,2,1)."<br>";
//echo $ven = mb_substr($game,-6,1).mb_substr($game,-5,1).mb_substr($game,-4,1)."<br>";
//---------------------------------------------------------------------------------------------------

/*10. Создайте переменную, присвойте ей число. Возведите это число в квадрат. Выведите его на экран.*/

//$sqrt = 66;
//echo $sqrt**2;
//-------------------------------------------------------------------------------------------------

/*1. Переделайте этот код так, чтобы в нем использовалась только одна переменная $var. Количество строк кода при этом не должно измениться.

$var = 3; 
$var1 = $var + 5; 
$var2 = $var1 * 10;
echo $var2;*/

//$var = 3; 
//$var=$var + 5; 
//$var=$var *10;
//echo $var;

//---------------------------------------------------------------------------------------------------




?>
