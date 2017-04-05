<?php
session_start();
?>

<header>
<a href="index.php"><h1>My Site</h1></a>
<div style="text-align: right">
    <form action="header.php" method="post">
    <?php
    if (!empty($_SESSION))
    {
        echo "Привет ".$_SESSION['username']." !";
        ?>
    
        <input type="hidden" name="destr" />
        <input type="submit"  value="Sign OUT" />
   
        <?php
        if(($_POST['destr'])){$_SESSION=array();}
    }
    else{
    ?>
    <a href="sinein.php">Sign in</a>
    <a href="sineup.php">Sing up</a>
        
    <?php } ?>
    </form>
</div>
</header>
