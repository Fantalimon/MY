<?php
include_once "config.php";

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


