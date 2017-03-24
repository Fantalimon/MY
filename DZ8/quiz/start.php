<h1 style="position: absolute; left: 27%; top: 20px;">Давайте пройдем тест</h1>
<div style="position: absolute; left:43%; top: 45%;">
<form action="index.php" method="post">
    <input type="hidden" name="question" value="<?php echo ++$question; ?>">
    <input type="submit" value="Начать тест">
</form>
</div>
