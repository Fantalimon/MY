<?php
require_once 'autoload.php';
class Query
{
    public $ASK;
    public $DESC;
    public $order;
    
    public function ASK(){
        $this->ASK=' ASK';
        return $this;
    }
    public function DESC(){
        $this->DESC=' DESC';
        return $this;
    }
    public function order($field){
        $this->order=' ORDER BY '.$field;
        return $this;
    }
    
    public function bild(){
        return new Sort($this);
    }
}
