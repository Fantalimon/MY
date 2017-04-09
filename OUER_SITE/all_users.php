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

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $user_id= $row['user_id'];
    $username = $row['username'];
    $email = $row['email'];
    $password=$row['password'];
    $edit = "<a 
href='edit_user.php?usr_eid=$user_id&username=$username&email=$email&password=$password'>"."edit"."</a> ";
    $delete = "<a href='delete_user.php?user_id=?$user_id'>"."delete"."</a> ";
    
    echo "<tbody >";
    echo "<tr>";
    
    echo "<td>" . $user_id. "</td>";
    
    echo "<td>" . $username . "</td>";
    
    echo "<td>" .  $email . "</td>";
    
    echo "<td>" . "$edit " . " $delete" . "</td>";
    
    echo "</tr>";
    echo "</tbody>";
    
}
echo "</table>";
echo "</div>";
closeConnection($link);


