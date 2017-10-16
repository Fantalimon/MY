<?php
require_once 'autoload.php';

class Paginator implements Ipagin
{
    public $count;
    public function getCountBase()
    {
        $db=DB::getInstance();
        
    }
}
