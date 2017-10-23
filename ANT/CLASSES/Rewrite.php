<?php
require_once BASE_PATH.'/autoload.php';
class Rewrite extends Addusers
{
    public function save()
    {
        $db = DB::getInstance();
        $id=$this->escape($this->clean($this->getId()));
        $name = $this->escape($this->clean($this->getName()));
        $seurname= $this->escape($this->clean($this->getSeurname()));
        $sex= $this->escape($this->clean($this->getSex()));
        $mygroup= $this->escape($this->clean($this->getGroup()));
        $email =  $this->escape($this->clean($this->getEmail()));
        $balls= $this->escape($this->clean($this->getBalls()));
        $berd_year= $this->escape($this->clean($this->getBerdYear()));
        $place =  $this->escape($this->clean($this->getPlace()));
        
        $query= "UPDATE `users` SET `name`='$name',`seurname`='$seurname',`sex`='$sex',`mygroup`='$mygroup',
`balls`=$balls,`berd_year`='$berd_year',`place`='$place',`email`='$email' WHERE `id`='$id' LIMIT 1";
        
        $result=$db->query($query);
        if (!$result) {die($db->error);}
        
        return true;
    }
    
}
