<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>question</title>
</head>
<body>
<form action="index.php" method="post">
  Question: <?php echo $question=[$question]['title'] ?>
    <br/>
    <br/>
    Answers:<br/><?php $answers = [$question]['answers'] ?>
    <?php shuffle($answers) ?>
    <?php foreach ($answers as $item): ?>
    <?php echo $item; ?>
 <input type="radio" name="answer" value="<?php echo $item ?>" />
        <br/>
    <?php endforeach; ?>
    <br/>
    <br/>
    <input type="hidden" name="question" value="<?php echo $question ?>" />
    <input type="submit" />
</form>
</body>
</html>







