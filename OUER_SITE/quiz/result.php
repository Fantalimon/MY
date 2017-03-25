<?php

$result = 0;
    
    if (isset($_SESSION['answers'])) {
        $answers = parse_ini_file('answers.ini');
        foreach ($_SESSION['answers'] as $key => $value) {
            if ($value == $answers[$key]) {
                $result++;
            }
        }
        
        setcookie("rezult",$result);
        setcookie("question",count($questions));
        session_destroy();
    }

?>

<div style="position: absolute; left: 43%; top:45%;">
    <form action="destroy.php" method="post">
        <input type="hidden" name="rezult" >
        <input type="hidden" name="question" >
        <input type="submit"   value="Завершить тест">
    </form>
</div>
