<?php


$config=parse_ini_file('config.ini',true);

define('FORM',$config['form']);
define('ADMINEMAIL',$config['adminemail']);

$configDb=$config['db'];
define('DB_HOST', $configDb['host']);
define('DB_USER', $configDb['user']);
define('DB_PASSWORD', $configDb['password']);
define('DB_NAME', $configDb['dbname']);
define('DB_PORT', $configDb['port']);




function getConnection($host=DB_HOST,$username=DB_USER,$password=DB_PASSWORD,$db_name=DB_NAME,$port=DB_PORT)
{
    static $link=null;
    if($link === null)
    {
        $link=mysqli_connect($host,$username,$password,$db_name,$port);
        if(!$link) die('Нет соединения с базой'.mysqli_connect_error());
        mysqli_query($link, 'SET NAMES utf8');
    }
    return $link;
}

function closeConnection(mysqli $link){mysqli_close($link);}


function addmassege($username,$email,$hompage,$text,$ip,$brouser,$created_at)
{
    $link=getConnection();
    $query="insert into userstext (`username`,`email`,`hompage`,`text`,`ip`,`brouser`,`created_at`) VALUES ('$username','$email',
'$hompage','$text',INET_ATON('$ip'),'$brouser','$created_at')";
    $rezult=mysqli_query($link, $query);
    if(!$rezult){if(!$rezult) die('ERROR'.mysqli_error($link));}
    mysqli_close($link);
}

function show ()
{
    $link=getConnection();
    $query="SELECT `username`,`email`,`created_at`,`text` FROM userstext";
    $rezult=mysqli_query($link, $query);
    if(!$rezult){if(!$rezult) die('ERROR'.mysqli_error($link));}
    mysqli_close($link);
}
