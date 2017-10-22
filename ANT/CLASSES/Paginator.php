<?php
require_once 'autoload.php';

class Paginator extends Entyty
{
    public $ctn;
    
    public $page;
    public $pageinlist;
    
    public $limit;
    
    public function getPage()
    {
        return $this->page;
    }
    
    public function setPage($page)
    {
        $this->page = $page;
        
        return $this;
    }
    
    public function getPageinList()
    {
        return $this->pageinlist;
    }
    
    public function setPageinList($pageinlist)
    {
        $this->pageinlist = $pageinlist;
        
        return $this;
    }
    
    
//    public function __construct($page, $pageinlist)
//    {
//        if (isset($page)) {
//            $this->setPage($page);
//        }
//        if (isset($pageinlist)) {
//            $this->setPageinList($pageinlist);
//        }
//    }
    
    
    public function CountBase()
    {
        $db = DB::getInstance();
        $query = "SELECT COUNT('id') FROM users";
        $result = $db->query($query);
        if (!$result) {
            die($db->error);
        }
        $row = $result->fetch_array();
        $ctn = $row[0];
        
        return $this->ctn = $ctn;
    }
    
    public function Limit()
    {
        
        $page = $this->escape($this->clean($this->getPage()));
        $pageinlist = $this->escape($this->clean($this->getPageinList()));

        
        $total = ceil($this->ctn / $pageinlist);
        $total = (int) $total;
        
        if (empty($page) or ($page < 0)) {
            $page = 1;
        }
        if ($page > $total) {
            $page = $total;
        }
        
        $start = $page * $pageinlist - $pageinlist;
    
    }
    
}
