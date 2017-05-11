<?php
include_once 'conf.php';

    $row='';
    $link=getConnection();
    $query="SELECT `username`,`email`,`created_at`,`text` FROM userstext ";

//$_GET['status']='up';
//$_GET['colon']='username';
$colon=$_GET['colon'];
($_GET['status']=='up' )?$query.="ORDER BY $colon ASC":$query.="ORDER BY $colon DESC";

$rezult=mysqli_query($link, $query);

echo "<div style='position: relative;left: 10%; ;text-align: center;'>";
echo "<table border='1' style='border: solid; width: 75%'>";
echo "<thead>";

echo "<tr>";

echo "<td>"."<a href='adminpanel.php?status=up&colon=username'>up</a>";
echo " / ";
echo "<a href='adminpanel.php?status=doun&colon=username'>doun</a>"."</td>";

echo "<td>"."<a href='adminpanel.php?status=up&colon=email'>up</a>";
echo " / ";
echo "<a href='adminpanel.php?status=doun&colon=email'>doun</a>"."</td>";

echo "<td>"."<a href='adminpanel.php?status=up&colon=created_at'>up</a>";
echo " / ";
echo "<a href='adminpanel.php?status=doun&colon=created_at'>doun</a>"."</td>";

echo "<td>"."<a href='adminpanel.php?status=up&colon=text'>up</a>";
echo " / ";
echo "<a href='adminpanel.php?status=doun&colon=text'>doun</a>"."</td>";


echo "</tr>";

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
    
    echo "<tbody >";
    echo "<tr>";
    
    echo "<td>" . $username . "</td>";
    echo "<td>" . $email . "</td>";
    echo "<td>" . $created_at. "</td>";
    echo "<td>" . $text. "</td>";
    
    echo "</tr>";
    echo "</tbody>";
    
}

echo "</table>";
echo "</div>";
    
    if(!$rezult){if(!$rezult) die('ERROR'.mysqli_error($link));}
    mysqli_close($link);
