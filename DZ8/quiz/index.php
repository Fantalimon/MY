<?php
session_start();
$question=$answers=0;
if(isset($_POST['question'])){
    
    $question=(int)$_POST['question'];
    if($_POST['question']>0 && isset ($_POST['answer']))
    {
        if(empty($_SESSION['answers'])){
            $_SESSION['answers']=[];
        }
    $_SESSION['answers'][$question]=$_POST['answer'];
        $answers=$_SESSION['answers'];
        $question++;
    }
}

$question=parse_ini_file('questions.ini',true);

var_dump($question);
?>

<h1>ТЕСТ</h1>

<?php
if (count($question)==count($answers))
    {include 'result.php';}
    elseif ($question>0){include 'question.php';}
    else {include 'start.php';}
?>
