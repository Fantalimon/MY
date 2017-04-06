<?php
$result = 0;
    
    if (isset($_SESSION['answers'])) {
        $answers = parse_ini_file('answers.ini');
        foreach ($_SESSION['answers'] as $key => $value) {
            if ($value == $answers[$key]) {
                $result++;
            }
        }
        $_SESSION['rezult']=$result++;
        $result=$_SESSION['rezult'];
        $questions=$_SESSION['question'];
        session_destroy();
    }

?>


<p>Your result is <?php echo   $result ?> from <?php echo $questions; ?></p>

<div style="position: absolute; left: 43%; top:45%;">
    <form action="destroy.php" method="post">
        <input type="hidden" name="rezult" >
        <input type="hidden" name="question" >
        <input type="submit"   value="Завершить тест">
    </form>
</div>
