<?php
include_once "config.php";

$row=[];

$edit="<a href='edit_user.php'>edit</a>";
$delete="<a href='delete_user.php'>delete</a>";

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
    
    echo "<td>"."$edit "." $delete"."</td>";
    
  echo "</tr>";
echo "</tbody>";
}

echo "</table>";
echo "</div>";

closeConnection($link);
