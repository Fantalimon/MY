<?php
require_once 'autoload.php';

class Paginator
{
    public $paginate;
    public function getCountBase()
    {
        $db=DB::getInstance();
        $query="SELECT COUNT('id') FROM users";
        $result=$db->query($query);
        if (!$result) {die($db->error);}
            $row = $result->fetch_array();
        echo "<pre>";
            var_dump( $row );
        echo "</pre>";
//            $ctn= count($row);
            echo "<pre>";
                var_dump( $ctn );
            echo "</pre>";
            $paginate=ceil($ctn/1);
//            echo "<pre>";
//                var_dump( $paginate );
//            echo "</pre>";
            $this->paginate=(int)$paginate;
        return $this->paginate;
    }
}


