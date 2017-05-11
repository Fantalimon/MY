<?php
include_once 'conf.php';

function show ()
{
    $link=getConnection();
    $query="SELECT `username`,`email`,`created_at`,`text` FROM userstext";
    $rezult=mysqli_query($link, $query);
 

echo "<div style='position: relative;left: 10%; ;text-align: center;'>";
echo "<table border='1' style='border: solid; width: 75%'>";
echo "<thead>";
echo "<tr>";
echo "<th>".'username'."</th>";
echo "<th>".'email'."</th>";
echo "<th>".'created_at'."</th>";
echo "<th>".'text'."</th>";
echo "</tr>";
echo "</thead>";

while($row = mysqli_fetch_array($rezult, MYSQLI_ASSOC))

{
    $username = $row['username'];
    $email = $row['email'];
    $created_at = $row['created_at'];
    $text = $row['text'];
    
    /*
    $edit = "<a href='edit_user.php?user_id=$user_id&username=$username&email=$email&password=$password'>"."edit"."</a> ";
    $delete = "<a href='delete_user.php?user_id=$user_id ' onclick='confirm(Действительно удалить?)'>";
    $delete.="delete";
    $delete.="</a> ";*/
    
    echo "<tbody >";
    echo "<tr>";
    
    
    echo "<td>" . $username . "</td>";
    
    echo "<td>" .  $email . "</td>";
    
    echo "<td>" . $created_at. "</td>";
    echo "<td>" . $text. "</td>";
    
    echo "</td>";
    
    echo "</tr>";
    echo "</tbody>";
    
}

echo "</table>";
echo "</div>";
    
    if(!$rezult){if(!$rezult) die('ERROR'.mysqli_error($link));}
    mysqli_close($link);
}
