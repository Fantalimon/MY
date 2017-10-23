<?php
require_once BASE_PATH.'/autoload.php';
class Sort
{
    protected $order;
    protected $ASC;
    protected $DESC;
    
    public function __construct(Query $builder)
    {
      $this->order=$builder->order;
      $this->ASC=$builder->ASC;
      $this->DESC=$builder->DESC;
    }
    
    public function __toString()
    {
            $str="$this->order";
            $str .= "$this->DESC";
            $str .= "$this->ASC";
            
        return $str;
    }
}
