<?php
require_once BASE_PATH.'autoload.php';

class Paginator
{
    public $paginate;
    public function CountBase()
    {
        $db=DB::getInstance();
        $query="SELECT COUNT('id') FROM users";
        $result=$db->query($query);
        if (!$result) {die($db->error);}
            $row = $result->fetch_array();
            $ctn= $row[0];
            $paginate=ceil($ctn/1);
            $paginate=(int)$paginate;
        return $this->paginate=$paginate;
    }
    
}


