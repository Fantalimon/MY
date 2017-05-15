<?php
session_start();

function captcha()
{
    $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ0123456789';
    $generate_string = '';
    $length = rand(3, 7);
    
    for ($x = 0; $x < $length; $x++) {
        $i = rand(0, 38);
        $generate_string .= $chars{$i};
    }
    return $generate_string;
}

 $_SESSION['captcha'] = captcha();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>form</title>
</head>
<body>
<?php echo "<a href='adminpanel.php'>Admin panel</a>  "." / "."  <a href='form.php'>Form</a>"; echo "<br>";echo "<br>";?>
<form action="posteg.php" method="post">
        <br>
        <input type="text" required='required' title="имя" name="username" placeholder="имя" />
        <br>
        <br>
        <input type="email" required='required' title="почта" name="email" placeholder="ваша почта" />
        <br>
        <br>
        <input type="url" title="HOMEPAGE" name="hompage" placeholder="ваш сайт" />
        <br>
        <br>
        <?php echo $_SESSION['captcha']; ?>
        <br>
        <input type="text" required='required' title="CAPTCHA" name="captcha" placeholder="captcha" />
        <br>
        <br>
        <textarea title="text" required='required' name="text" rows="10%" cols="33%" placeholder="write som in ther"></textarea>
    <br>
    <br>
    <input type="submit" value="Отправить"/>
</form>

</body>
</html>
