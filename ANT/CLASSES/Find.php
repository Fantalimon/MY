<?php
require_once BASE_PATH.'/autoload.php';
class Find extends Scroll
{
    private $find;
    
    public function getFind()
    {
        return $this->find;
    }
    
    public function setFiend($find)
    {
        $this->find = $find;
        
        return $this;
    }
    
    public function __construct($find)
    {
        if (isset($find)) {
            $this->setFiend($find);
        }
    }
    
    public function show($wquery)
    {
        $db = DB::getInstance();
        $find=$this->escape($this->clean($this->getFind()));
        $query="SELECT `name`, `seurname`,`mygroup`,`balls` FROM users WHERE `name` LIKE '%".$find."%' OR `seurname` LIKE '%".$find."%' OR `mygroup` LIKE '%".$find."%' OR `balls` LIKE '%".$find."%'".$wquery;
        
        
        $result = $db->query($query);
        if (!$result) {
            die($db->error);
        }
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
