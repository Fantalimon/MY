<?php
$result=0;

if (isset($_SESSION['answers'])){$answers = parse_ini_file('answers.ini');
foreach (($_SESSION['answers']) as $key=>$value){if ($value == $answers [$key]){$result++;}
    session_destroy();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p>Your result is <?php echo $result; ?> from <?php echo count($questions); ?> </p>
<p><a href="quiz_index.php"> start the test again</a></p>
</body>
</html>
