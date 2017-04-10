<?php
include "config.php";

$user_id=trim(strip_tags( $_GET['user_id']));
$user_id=(int)$user_id;

delUser($user_id);

header(allUsers);

?>

<!--    <script> confirm ('Действительно удалить?')</script>-->

<?php



?>
