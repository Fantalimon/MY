<?php
if (!isset($_COOKIE['sit'])) {
    session_start();
    setcookie('sit',session_id(),strtotime('10 year'));
}else {
    session_id($_COOKIE['sit']);
    session_start();
}




require_once 'config.php';

require_once 'CLASSES/DB.php';
require_once 'CLASSES/Entyty.php';


require_once 'CLASSES/Scroll.php';
require_once 'CLASSES/Sort.php';
require_once 'CLASSES/Query.php';
require_once 'CLASSES/Find.php';


require_once 'CLASSES/Addusers.php';
require_once 'CLASSES/Rewrite.php';


