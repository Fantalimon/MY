<?php

include_once 'autoload.php';

$pagin=new Paginator();
$pagin->CountBase();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Список</title>
    
<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/jquery-3.2.1.js"></script>
    
</head>
<body>





<div id="yes">
    
    <?php
    echo "<div style=' text-align: center;'>";
    for ($i = 1; $i <= $pagin->paginate; $i++) {
        echo "<a href=" . 'adminpanel.php' . "?page=" . $i . ">" . $i . "</a> ";
    }
    echo "</div>";
    
    ?>
</div>


<script src="js/bootstrap.js"></script>
<script src="js/ajaxQuery.js"></script>

</body>
</html>

