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
add_number_in_file(4);
