<?php

//$result=$_COOKIE['rezult'];
//$question=$_COOKIE['question'];

//$result='';
//$question='';
$result = (!empty($_COOKIE['rezult'])) ? $_COOKIE['rezult'] : '';
$question = (!empty($_COOKIE['question'])) ? $_COOKIE['question'] : '';
setcookie('rezult','');
setcookie('question','');

?>

<p>Your result is <?php echo  $result ?> from <?php echo $question; ?></p>
<p><a href="index_quiz.php">Start the test again</a></p>
<p><a href="index.php">На главную</a></p>
