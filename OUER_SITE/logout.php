<?php
include "config.php";
session_start();
if(isset($_POST['destr'])){
    session_destroy();
    header(LOCATION);
}
else{header(LOCATION);}
