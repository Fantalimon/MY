<?php

require_once BASE_PATH.'/autoload.php';

class Scroll extends Entyty
{
    
    
    public $ctn;
    
    public $page;
    public $pageinlist;
    
    
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
    
    
    
    public function __construct($page, $pageinlist)
    {
        if (isset($page)) {
            $this->setPage($page);
        }
        if (isset($pageinlist)) {
            $this->setPageinList($pageinlist);
        }
    }
    
    
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
    
    
    
    public function show($wquery)
    {
    
        $page = $this->escape($this->clean($this->getPage()));
        $pageinlist = $this->escape($this->clean($this->getPageinList()));
    
    
        $total = ceil((self::CountBase()/ $pageinlist));
        $total = (int) $total;
    
        if (empty($page) or ($page < 0)) {
            $page = 1;
        }
        if ($page > $total) {
            $page = $total;
        }
    
        $start = $page * $pageinlist - $pageinlist;
        
        $db = DB::getInstance();
        
        $query="SELECT `name`, `seurname`,`mygroup`,`balls` FROM users "."$wquery"." LIMIT "." $start ".","."$pageinlist";
        
        
//        echo $query."<br>"."<br>";
        
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
    
    
    public function Limit()
    {
        $page2right='';
        $page2left='';
        $page1left='';
        $page1right='';
        $nextpage='';
        $pervpage='';
        
        $page = $this->escape($this->clean($this->getPage()));
        $pageinlist = $this->escape($this->clean($this->getPageinList()));
        
        
        $total = ceil(self::CountBase()/ $pageinlist);
        $total = (int) $total;
        
        if (empty($page) or ($page < 0)) {
            $page = 1;
        }
        if ($page > $total) {
            $page = $total;
        }
        
        // Проверяем нужны ли стрелки назад
        if ($page != 1) $pervpage = ($page - 1);
        
// Проверяем нужны ли стрелки вперед
        
        $nextpage = ($page != $total)? ($page + 1) : $total ;

// Находим две ближайшие станицы с обоих краев, если они есть
        if($page - 2 > 0) $page2left = ($page - 2) ;
        if($page - 1 > 0) $page1left =  ($page - 1);
        if($page + 2 <= $total) $page2right =  ($page + 2) ;
        if($page + 1 <= $total) $page1right =  ($page + 1) ;
        
        $pervpage=(int)$pervpage;
        $page2left=(int)$page2left;
        $page1left=(int)$page1left;
        $page=(int)$page;
        $page1right=(int)$page1right;
        $page2right=(int)$page2right;
        $nextpage=(int)$nextpage;
        
// Вывод меню
        $data=[];
        $data['pervpage']= $pervpage;
        $data['page2left']=$page2left;
        $data['page1left']=$page1left;
        $data['page']=$page;
        $data['page1right']=$page1right;
        $data['page2right']=$page2right;
        $data['nextpage']=$nextpage;
        return $data;
    }
    
    
}
