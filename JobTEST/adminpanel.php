<?php
include_once 'conf.php';

    $row='';
    $link=getConnection();
    $query="SELECT `username`,`email`,`created_at`,`text` FROM  userstext ";
    
  $pageinlist=2;

$_GET['status']='';
$_GET['colon']='';
        (isset($_GET['page'])) ? $page = (($_GET['page']) - 1) : $page = 1;
        if (isset($_GET['status']) && isset($_GET['colon'])) {
        
            $status = $_GET['status'];
        
            switch ($status) {
                case 'asc':
                    break;
                case 'desc':
                    break;
                default:
                    $status = 'asc';
            }
        
            $colon = $_GET['colon'];
        
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
 
  $startpage=abs($page*$pageinlist);
  $startpage=(int)$startpage;
  $pageinlist=(int)$pageinlist;

$startpage=mysqli_real_escape_string($link, $startpage);
$pageinlist=mysqli_real_escape_string($link,$pageinlist);

    $queryPage="SELECT COUNT(*) FROM userstext";
    $rezultPage=mysqli_query($link, $queryPage);
    $rowPage=mysqli_fetch_array($rezultPage);
    $sumWriters=$rowPage[0];

$num_pages=ceil($sumWriters/$pageinlist);
$num_pages=(int)$num_pages;

($status=='desc' )?$query.="ORDER BY $colon DESC LIMIT $startpage,$pageinlist":$query.="ORDER BY $colon ASC LIMIT $startpage,$pageinlist";

$rezult=mysqli_query($link, $query);

for($i=1;$i<=$num_pages;$i++) {
    echo "<a href=" .'adminpanel.php'."?page=" . $i."&status=".$status."&colon=".$colon.">" . $i . "</a> ";
}

echo "<div style='position: relative;left: 10%; ;text-align: center;'>";
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

    while($row=mysqli_fetch_array($rezult))
    {
        $username=$row['username'];
        $email=$row['email'];
        $created_at=$row['created_at'];
        $text=$row['text'];
    
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
    

