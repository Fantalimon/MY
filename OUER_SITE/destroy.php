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

<form action="index_quiz.php" method="post">
    <input type="submit" value="Начать тест" />
</form>
<br>
<form action="index.php" method="post" >
<input type="submit" value="На главную" />
</form>
