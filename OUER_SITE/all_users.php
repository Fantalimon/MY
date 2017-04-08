<?php
include_once "config.php";
//session_start();

$row=[];

$link=getConnection();

$query='SELECT * FROM users';

$result=mysqli_query($link,$query);

echo "<div style='position: relative;left: 10%; ;text-align: center;'>";
echo "<table border='1' style='border: solid; width: 75%'>";

echo "<thead>";
echo "<tr>";
  echo "<th>".'id'."</th>";
  echo "<th>".'username'."</th>";
  echo "<th>".'email'."</th>";
  echo "<th>".'action'."</th>";
echo "</tr>";
echo "</thead>";

$row=mysqli_fetch_array($result);
foreach($row as $item)
{
     
     $id=$item['user_id'];
     $name=$item['username'];
     $email=$item['email'];
    
    $_SESSION['ses_id']=$id;
    
    //TODO нужно отправить както АДИ по ссылке.
    
    $_SESSION['ses_id'].$edit="<a href='edit_user.php'>edit</a> ";
         $_SESSION['ses_id'].$delete="<a href='delete_user.php'>delete</a>";

echo "<tbody >";
  echo "<tr>";
  
    echo "<td>".$id."</td>";
   
    echo "<td>".$name."</td>";
  
    echo "<td>".$email."</td>";
    
    echo "<td>"."$edit "." $delete"."</td>";
    
  echo "</tr>";
echo "</tbody>";

}

echo "</table>";
echo "</div>";

closeConnection($link);
