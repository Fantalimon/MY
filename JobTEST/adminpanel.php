<?php

include_once 'conf.php';
$row = '';
$status = '';
$colon = '';
$i='';
$link = getConnection();
$page = 1;
$pageinlist = PAGEINLIST;

if (isset($_GET['page'])) {
    $page = strip_tags(trim(htmlspecialchars_decode($_GET['page'])));
    $page=(int)$page;
}
$startpage = abs($page - 1) * $pageinlist;
if (isset($_GET['status'])) {
    $status = strip_tags(trim(htmlspecialchars_decode($_GET['status'])));
    $status=(string)$status;
    switch ($status){
        case 'asc':
             break;
        case 'desc':
            break;
        default:
            $status='asc';
    }
}
if (isset($_GET['colon'])) {
    $colon = strip_tags(trim(htmlspecialchars_decode($_GET['colon'])));
    $colon=(string)$colon;
    switch ($colon) {
        case 'username':
            break;
        case 'email':
            break;
        case 'created_at':
            break;
        case 'text':
            break;
        default:
            $colon = 'username';
    }
}
$status=mysqli_real_escape_string($link, $status);
$colon=mysqli_real_escape_string($link, $colon);
$startpage=mysqli_real_escape_string($link, $startpage);
$pageinlist=mysqli_real_escape_string($link,$pageinlist);

$query = "SELECT `username`,`email`,`created_at`,`text` FROM ". TB_NAME;
if($colon) {
    $query .= " ORDER BY ".$colon;
    if ($status) {
        $query .= " ".$status;
    }
}
$query .= " LIMIT ".$startpage.", ".$pageinlist;

$rezult = mysqli_query($link, $query);
echo "<div style=' text-align: center;'>";
echo "<a href='adminpanel.php'>Admin panel</a>  "." / "."  <a href='form.php'>Form</a>";
echo "</div>";
echo "<br>";
echo "<br>";
echo "<div style='position: relative;left: 10%; text-align: center;'>";
echo "<table border='1' style='border: solid; width: 75%'>";
echo "<thead>";
echo "<tr>";
echo "<td>"."<a href='adminpanel.php?page=$i&status=asc&colon=username'>asc</a>";
echo " / ";
echo "<a href='adminpanel.php?page=$i&status=desc&colon=username'>desc</a>"."</td>";
echo "<td>"."<a href='adminpanel.php?page=$i&status=asc&colon=email'>asc</a>";
echo " / ";
echo "<a href='adminpanel.php?page=$i&status=desc&colon=email'>desc</a>"."</td>";
echo "<td>"."<a href='adminpanel.php?page=$i&status=asc&colon=created_at'>asc</a>";
echo " / ";
echo "<a href='adminpanel.php?page=$i&status=desc&colon=created_at'>desc</a>"."</td>";
echo "<td>"."<a href='adminpanel.php?page=$i&status=asc&colon=text'>asc</a>";
echo " / ";
echo "<a href='adminpanel.php?page=$i&status=desc&colon=text'>desc</a>"."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>".'username'."</th>";
echo "<th>".'email'."</th>";
echo "<th>".'created_at'."</th>";
echo "<th>".'text'."</th>";
echo "</tr>";
echo "</thead>";
while($row = mysqli_fetch_array($rezult))
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

$result = mysqli_query($link,"SELECT COUNT(*) FROM ".TB_NAME );

$rowPage=mysqli_fetch_array($result);
$sumWriters=$rowPage[0];

$num_pages=ceil($sumWriters/$pageinlist);
$num_pages=(int)$num_pages;
echo "<br>";
echo "<br>";
echo "<br>";
echo "<div style=' text-align: center;'>";
for($i = 1; $i <= $num_pages; $i++) {
    echo "<a href=" .'adminpanel.php'."?page=".$i."&status=".$status."&colon=".$colon.">".$i."</a> ";
}
if(!$rezult){if(!$rezult) die('ERROR'.mysqli_error($link));}
echo "</div>";
mysqli_close($link);
