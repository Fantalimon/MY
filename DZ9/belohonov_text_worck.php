<?php
/*1. Написать функцию ​ ХХХ ​ (имя подставьте своё), которая на вход принимает
необязательный параметр - число, по-умолчанию равное 0. Значение параметра
необходимо приводить к числу.
В функции необходимо создать файл (в последующем обращении - открыть
существующий) и записывать значение параметра в файл.
Если файл ​ пустой​ , то запишется число из параметра.
Если файл ​ не пустой​ , то к значению в файле необходимо прибавить значение в
параметре и записать в тот же файл.*/

function add_number_in_file($a=0)
{
    $a=(int)$a;
    $file=fopen("dgust_file.txt","a+");
    if(empty($file)){fwrite($file, $a).PHP_EOL;}
    else{
     $b=fread($file,100);
     $file2=fopen("dgust_file.txt", "w+");
     fwrite($file2, $b+$a).PHP_EOL;
    }
    fclose($file);
}
add_number_in_file(1);

/*2. Даны два файла ​ ХХХ​ и ​ YYY.​ В файлах записаны тестовые слова (на латинице,
придумайте сами). разделенными пробелами. Необходимо написать функцию,
которая создаст новые три файла:
only_first.txt​ : содержащий строки, которые встречаются только в первом файле;
both.txt​: только строки, которые встречаются в обоих файлах;
more_two.txt​ : только строки, которые встречаются в каждом файле более двух раз.*/

$xxx=fopen("xxx.txt", "r");
$yyy=fopen("yyy.txt", "r");


function separate_file_content($xxx,$yyy)
{

    $str_xxx=fgetss($xxx);
    $str_yyy=fgetss($yyy);
    $words_xxx=explode(" ",$str_xxx);
    $words_yyy=explode(" ",$str_yyy);

    $only_first=fopen("only_first.txt", "a");
    $both=fopen("both.txt", "a");
    $more_two=fopen("more_two.txt", "a");
    
    $arr=[];
    foreach ($words_xxx as $value_x)
    {
       foreach ($arr as $var_x)
       {
           if ($var_x==$value_x) {
               if (isset($arr[$value_x])) {
                   $arr[$value_x]++;
               }else{$arr[$value_x];}
           }
       }
    }
//    foreach ($arr as $rez)
//    {
//        fwrite($only_first, " ".$rez." ".PHP_EOL);
//    }
    echo "<pre>";
        var_dump( $arr );
    echo "</pre>";
    
    fclose($only_first);
fclose($both);
fclose($more_two);
}

separate_file_content($xxx, $yyy);

fclose($xxx);
fclose($yyy);
