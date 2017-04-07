<?php
//connect  to db
$host='127.0.0.1';
$username='root';
$pass='stress';
$dbname='personal';

$row='';


if(!empty($_GET)){
    $id=empty($_GET['id'])?'':trim(strip_tags($_GET['id']));
    $id=(int)$id;
    
    $link=mysqli_connect($host,$username,$pass,$dbname);
    if(!$link) die('Not linked'.mysqli_error($link));
    mysqli_select_db($link, $dbname);
    mysqli_query($link,'SET NAMES utf8');
    $query="SELECT * FROM workers WHERE id=$id";
    
    $rezult = mysqli_query($link,$query);
    
    $row=mysqli_fetch_assoc($rezult);
    
    mysqli_close($link);
}
else{$message ='Введите значение';}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>form</title>
</head>
<body>
<form action="mysql.php" method="get">
    <fieldset title="персональные данные">
        <legend>Данные по Id</legend>
        <br>
        <input type="text" title="ID" name="id"   placeholder="введите число" />
        <br>
        <br>
      <input type="submit" value="Получить данные">
    </fieldset>
</form>
<h2><?php if(!isset($id)){ echo $message;} ?></h2>
<table>
    
    <?php foreach ($row as $key=>$item) { ?>
    
        <tr><?php echo $key.' '.$item.' ';  ?></tr>
        
    <?php } echo "<br>";?>
    
</table>
</body>
</html>

