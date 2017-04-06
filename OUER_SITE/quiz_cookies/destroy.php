<?php
$result = (!empty($_COOKIE['rezult'])) ? $_COOKIE['rezult'] : '';
$question = (!empty($_COOKIE['question'])) ? $_COOKIE['question'] : '';
setcookie('question','');
setcookie('rezult','');

?>

<p>Your result is <?= $result ?> from <?php echo $question; ?></p>
<p><a href="index_quiz.php">Пройти тест еще раз</a></p>
<p><a href="http://127.0.0.1/sit.my/MY_DZ/OUER_SITE/">На главную страницу</a></p>
