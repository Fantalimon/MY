<?php
require_once 'autoload.php';
class Rewrite extends Addusers
{
    /**
     * @var int
     */
    private $id;
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    public function save()
    {
        $db = DB::getInstance();
        $name = $this->escape($this->clean($this->getName()));
        $seurname= $this->escape($this->clean($this->getSeurname()));
        $sex= $this->escape($this->clean($this->getSex()));
        $mygroup= $this->escape($this->clean($this->getGroup()));
        $email =  $this->escape($this->clean($this->getEmail()));
        $balls= $this->escape($this->clean($this->getBalls()));
        $berd_year= $this->escape($this->clean($this->getBerdYear()));
        $place =  $this->escape($this->clean($this->getPlace()));
        
        $query= "UPDATE users SET name=".$name.",seurname=".$seurname.",sex=".$sex.",mygroup=".$mygroup.",balls=".$balls.",berd_year=".$berd_year.",place=".$place.",email=".$email." WHERE id=".$this->getId()." LIMIT 1";
        
        echo $query;
        
        $result=$db->query($query);
        if (!$result) {die($db->error);}
        
        return true;
    }
}
