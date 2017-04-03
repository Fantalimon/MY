<?php
/*1. Написать функцию ​ ХХХ ​ (имя подставьте своё), которая на вход принимает
необязательный параметр - число, по-умолчанию равное 0. Значение параметра
необходимо приводить к числу.
В функции необходимо создать файл (в последующем обращении - открыть
существующий) и записывать значение параметра в файл.
Если файл ​ пустой​ , то запишется число из параметра.
Если файл ​ не пустой​ , то к значению в файле необходимо прибавить значение в
параметре и записать в тот же файл.*/

//header ("Refresh: 1");
//echo date("H:i:s");

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

more_two.txt​ : только строки, которые встречаются в каждом файле более двух раз.

*/

function anti_unique($arr=[])
{
    $arr_new=[];
    $count=count($arr)-1;
    foreach($arr as $key=>$value)
    {
        $copy=0;
        for($i=1;$i<=$count;$i++)
        {
            if($value==$arr[$i]){$copy++;}
        }
        if($copy>1){$arr_new[]=$value;}
    }
    return $arr_new;
}
function anti_unique2($arr=[])
{
    $arr_new=[];
    $count=count($arr)-1;
    foreach($arr as $key=>$value)
    {
        $copy=0;
        for($i=1;$i<=$count;$i++)
        {
            if($value==$arr[$i]){$copy++;}
        }
        if($copy>2){$arr_new[]=$value;}
    }
    return $arr_new;
}



$xxx=fopen("x.txt", "r");
$yyy=fopen("y.txt", "r");

function separate_file_content($xxx,$yyy)
{
    
    $str_xxx=fgetss($xxx);
    $str_yyy=fgetss($yyy);
    
    $words_xxx=explode(" ",$str_xxx);
    $words_yyy=explode(" ",$str_yyy);



    $only_first=fopen("only_first.txt", "w");
    $both=fopen("both.txt", "w");
    $more_two=fopen("more_two.txt", "w");

    $arr=[];
    $arr=array_unique(anti_unique($words_xxx));
foreach ($arr as $value)
    {
        fwrite($only_first,$value.' ');
    }
    fwrite($only_first,PHP_EOL);
    fwrite($only_first,"-----------------------------------------------------");
    fwrite($only_first,PHP_EOL);

    $arr_both=[];
    
    foreach ($words_xxx as $value_x)
    {
        foreach ($words_yyy as $value_y)
        {
            if($value_x==$value_y)
            $arr_both[]=$value_x;
        }
    }
    $arr_both=array_unique($arr_both);
        
    foreach($arr_both as $value)
    {
        fwrite($both,$value.' ');
    }
    fwrite($both,PHP_EOL);
    fwrite($both,"-----------------------------------------------------");
    fwrite($both,PHP_EOL);
    
    
    $arr_more_two=[];
    $arr_more_two2=[];
    $arr_more_two_all=[];
    
        $arr_more_two=array_unique(anti_unique2($words_xxx));
        $arr_more_two2=array_unique(anti_unique2($words_yyy));
    
        $arr_more_two_all =array_unique(array_merge($arr_more_two2,$arr_more_two));
    
        
    foreach ($arr_more_two_all as $value) {
        
            fwrite($more_two, $value.' ');
        }
    
    fwrite($more_two,PHP_EOL);
    fwrite($more_two,"-----------------------------------------------------");
    fwrite($more_two,PHP_EOL);
    
   
fclose($only_first);
fclose($both);
fclose($more_two);
}

//separate_file_content($xxx, $yyy);

fclose($xxx);
fclose($yyy);

/*3. Дан файл со словами. Упорядочить слова по алфавиту и записать в тот же файл.*/
function alf()
{
    $arr=[];
    for($i=122;$i>=97;$i--)
    {
        $arr[]=chr($i);
    }
$file=fopen("TEXT.txt", "w");
    foreach ($arr as $value)
    {
        fwrite($file, $value.PHP_EOL);
    }
   fclose($file);
}
//alf();

/*
function word($arr=[])
{
    $word = [];
    $words_str = '';
    
    $length_words = rand(1, 10);
    $str_alf = "abcdefghijklmnopqrstuvwxyz";
    
    for ($a = 1; $a <= $length_words; $a++) {
            $i = rand(0, 25);
            $words_str .= $str_alf{$i};
        }
      $word[]=$words_str;
    return $word;
}
echo "<pre>";
    var_dump( word() );
echo "</pre>";exit;

function great_file()
{
//    $handle='TEXT.txt';
//    chmod($handle, 0777);
    
    
//    $text=fopen('TEXT.txt', 'a');
//    fwrite($text, $string);
//    fclose($handle);
}
great_file();*/

function alf_sort()
{
 $handl="TEXT.txt";
 $mode="a";
 $text_file=fopen($handl, $mode);
 $arr=[];
 $arr= file($handl,FILE_SKIP_EMPTY_LINES);
 fclose($text_file);
 function trim_value (&$value)
 {
     $value=trim($value);
 }
 array_walk($arr, 'trim_value');
 $arr2=[];
 foreach ($arr as $key=>$value)
 {
     $asci=ord($value);
     $arr2[$asci]=$value;
 }
    sort($arr2);
  $text_rewrite=fopen($handl, "w");
 foreach ($arr2 as $value)
 {
     $alf=$value.PHP_EOL;
     fwrite($text_rewrite,$alf);
 }
  fclose($text_rewrite);
    
}
//alf_sort();

/*4. Дан файл. Каждая строка содержит имя, пароль и email, разделенные символами ':'
(двоеточие).
Например:
john:12345:​ john@gmail.com
kate:12345:​
kate@gmail.com
test:21345:​
test@gmail.com
mike:12145:​ test@gmail.com
Удалить строки с повторами email и строки, в которых совпадают имена (т.е. удалятся
две последних записи).*/

function del_copy_email ()
{
    $handle='email.txt';
    $mode='a';
    $rewrite='w';
    $file=fopen($handle, $mode);
    $arr=file($handle,FILE_SKIP_EMPTY_LINES);
    fclose($file);
    function trim_value (&$value)
    {
        $value=trim($value);
    }
    array_walk($arr,'trim_value');
    $arr2=[];
    
    foreach ($arr as $key=>$value)
    {
        $exp=explode(":", $value);
        $arr2[]=
        [
           'ferstname' => $exp[0],
           'pass' => $exp[1],
           'mail' => $exp[2]
        ];
    }
    
    $var='';
    $clone='';
    $ctn=count($arr2)-1;
    for($i=0;$i<=$ctn;$i++)
    {
        $copy=0;
        
        $var=$arr2[$i]['mail'];
       
        for($k=0;$k<=$ctn;$k++)
        {
            $clone=$arr2[$k]['mail'];
            
            if ($var == $clone)
            {
               $copy++;
            }
            if($copy>1)
            {
                unset($arr2[$k]);
            }
        }
    }
  
      $ctn2=count($arr2)-1;
    $file=fopen($handle, $rewrite);
    for($z=0;$z<=$ctn2;$z++)
    {
        fwrite($file, implode(':', $arr2[$z]).PHP_EOL);
    }
    fclose($file);
}
//del_copy_email();

/*
5. Написать функцию, которая будет показывать список всех файлов в данной папке в
виде дерева, как показано на рис. ниже (поиск файлов происходит во всех вложенных
уровнях).

root dir
-- dir 1
-- dir 2
---- dir 2.1
---- dir 2.2
------ dir 2.2.1
---- dir 2.3

*/

//$root_dir='root dir '.' [ '.getcwd().' ]';

$path = '/home/malinka/Стільниця/sit.my/MY_DZ/DZ9';


function scd($path)
{
    $queue = [];
    if ($handle = opendir($path))
    {
        echo '<ol class="tree">';
        
        while (false !== ($file = readdir($handle)))
        {
            if (is_dir($path.'/'.$file) && $file != '.' && $file !='..')
            {
                echo '<li>' . $file;
                scd($path.'/'.$file.'/');
                echo '</li>';
            }
            else if ($file != '.' && $file !='..')
            {
                $queue[] = $file;
            }
        }
        
        foreach ($queue as $file) {
            echo '<li>' . $file . '</li>';
        }
        
        echo '</ol>';
    }
}

//scd($path);









