<h1 style="position: relative; left: 27%; top: 20px;">Давайте пройдем тест</h1>
<div style="position: relative; left:43%; top: 45%;">
<form action="quiz_session/index_quiz.php" method="post">
    <input type="hidden" name="question" value="<?php echo ++$question; ?>">
    <input type="submit" value="Начать тест">
</form>
</div>
