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
        switch ($field) {
            case 'mygroup':
                $field = 'mygroup';
                break;
            case 'balls':
                $field = 'balls';
                break;
            case 'name':
                $field = 'name';
                break;
            case 'seurname':
                $field = 'seurname';
                break;
            default:
                $field = 'mygroup';
        }
        $this->order=' ORDER BY '.$field;
        return $this;
    }
    
    public function bild(){
        return new Sort($this);
    }
}
