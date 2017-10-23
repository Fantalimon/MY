<?php
require_once BASE_PATH.'/autoload.php';

class Paginator extends Entyty
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
    
    
    
    public function __construct($page,$pageinlist)
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
        if ($page != 1) $pervpage = '<a href= ./?page=1><<</a> <a href= ./?page='. ($page - 1) .'><</a> ';
// Проверяем нужны ли стрелки вперед
        if ($page != $total) $nextpage = ' <a href= ./?page='. ($page + 1) .'>></a> 
                                   <a href= ./?page=' .$total. '>>></a>';

// Находим две ближайшие станицы с обоих краев, если они есть
        if($page - 2 > 0) $page2left = ' <a href= ./?page='. ($page - 2) .'>'. ($page - 2) .'</a>  ';
        if($page - 1 > 0) $page1left = '<a href= ./?page='. ($page - 1) .'>'. ($page - 1) .'</a>  ';
        if($page + 2 <= $total) $page2right = '  <a href= ./?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
        if($page + 1 <= $total) $page1right = '  <a href= ./?page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// Вывод меню
        return '<li>'.$pervpage.$page2left.$page1left.'<span>'.$page.'</span>'.$page1right.$page2right.$nextpage.'</li>';
    
    }
    
}
