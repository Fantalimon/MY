<?php
$question='';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>start</title>
</head>
<body>
<p>The test contains 5 questions.</p>
<h3> Start the Quiz </h3>
<form action="quiz_index.php" method="post">
    <input type="hidden" name ="question" value="<?php echo ++$question ?>"/>
<input ​ type=​ "submit"​>
</form>
</body>
</html>

