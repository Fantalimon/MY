<?php
require_once BASE_PATH.'autoload.php';
class Rewrite extends Addusers
{
    /**
     * @var int
     */
    private $id;
    
    
    
    /**
     * User constructor.
     *
     * @param $userData
     */
    public function __construct($userData)
    {
       
        if (isset($userData['name'])) {
            $this->setName($userData['name']);
        }
        if (isset($userData['seurname'])) {
            $this->setSeurname($userData['seurname']);
        }
        if (isset($userData['sex'])) {
            $this->setSex($userData['sex']);
        }
        if (isset($userData['mygroup'])) {
            $this->setGroup($userData['mygroup']);
        }
        if (isset($userData['email'])) {
            $this->setEmail($userData['email']);
        }
        if (isset($userData['balls'])) {
            $this->setBalls($userData['balls']);
        }
        if (isset($userData['berd_year'])) {
            $this->setBerdYear($userData['berd_year']);
        }
        if (isset($userData['place'])) {
            $this->setPlace($userData['place']);
        }
    }
    
    
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
    
    /**
     * Get user info.
     *
     * @return array
     */
    public function getUserInfo()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'seurname'=>$this->getSeurname(),
            'sex'=>$this->getSex(),
            'mygroup'=>$this->getGroup(),
            'email' => $this->getEmail(),
            'balls'=>$this->getBalls(),
            'berd_year'=>$this->getBerdYear(),
            'place' => $this->getPlace()
        ];
    }
    
    
    /**
     * String representation of object
     *
     * @link  http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {http://fontawesome.ru/all-icons/
        return serialize($this->getUserInfo());
    }
    
    /**
     * Constructs the object
     *
     * @link  http://php.net/manual/en/serializable.unserialize.php
     *
     * @param string $serialized <p>
     *                           The string representation of the object.
     *                           </p>
     *
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        $userInfo = unserialize($serialized);
        $this
            ->setId($userInfo['id'])
            ->setName($userInfo['name'])
            ->setSeurname($userInfo['seurname'])
            ->setSex($userInfo['sex'])
            ->setGroup($userInfo['mygroup'])
            ->setEmail($userInfo['email'])
            ->setBalls($userInfo['balls'])
            ->setBerdYear($userInfo['berd_year'])
            ->setPlace($userInfo['place']);
    }
    
    
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
        
        echo $query;
        
        $result=$db->query($query);
        if (!$result) {die($db->error);}
        
        return true;
    }
}
