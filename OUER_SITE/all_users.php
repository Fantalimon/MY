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

$row=[];

$link=getConnection();

$query='SELECT * FROM users';

$result=mysqli_query($link,$query);
echo "<div style='position: relative;left: 25%; ;text-align: center;'>";
echo "<table border='1'; style='border: solid; width: 50%'>";

echo "<thead>";
echo "<tr>";
echo "<th>".'id'."</th>";
echo "<th>".'username'."</th>";
echo "<th>".'email'."</th>";
echo "</tr>";
echo "</thead>";
while($row=mysqli_fetch_array($result))
{
    $id=$row['user_id'];
    $name=$row['username'];
    $email=$row['email'];
echo "<tbody >";
  echo "<tr>";
    echo "<td>".$id."</td>";
   
    echo "<td>".$name."</td>";
  
    echo "<td>".$email."</td>";
  echo "</tr>";
echo "</tbody>";
}

echo "</table>";
echo "</div>";
closeConnection($link);
