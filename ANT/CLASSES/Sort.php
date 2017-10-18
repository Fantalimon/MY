<?php
require_once 'autoload.php';
class Sort
{
    protected $order ;
    protected $ASK ;
    protected $DESC ;
    
    public function __construct(Query $builder)
    {
      $this->order=$builder->order;
      $this->ASK=$builder->ASK;
      $this->DESC=$builder->DESC;
    }
    public function __toString()
    {
        $str="$this->order";
        if(!empty($this->ASK)){$str.="$this->DESC";}
        else{$str.="$this->ASK";}
     return $str;
    }
}
