<?php
require_once BASE_PATH.'/autoload.php';

class Addusers extends Entyty implements Serializable
{
    
    /**
     * @var int
     */
    private $id;
    
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var string
     */
    private $seurname;
    
    /**
     * @var string
     */
    private $sex;
    
    /**
     * @var string
     */
    private $group;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $balls;
    /**
     * @var string
     */
    private $berd_year;
    /**
     * @var string
     */
    private $place;
    
    
    /**
     * User constructor.
     *
     * @param $userData
     */
    public function __construct($userData)
    {
        if (isset($userData['id'])) {
            $this->setId($userData['id']);
        }
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $username
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    
    /**
     * @return string
     */
    public function getSeurname()
    {
        return $this->seurname;
    }
    
    /**
     * @param string $seurname
     *
     * @return $this
     */
    public function setSeurname($seurname)
    {
        $this->seurname = $seurname;
        return $this;
    }
    
    
        
    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }
    
    /**
     * @param string $sex
     *
     * @return $this
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
        return $this;
    }
    
    
       
        
    /**
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }
    
    /**
     * @param string $group
     *
     * @return $this
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }
    
    
    
    
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    
    
    
    
    /**
     * @return string
     */
    public function getBalls()
    {
        return $this->balls;
    }
    
    /**
     * @param string $balls
     *
     * @return $this
     */
    public function setBalls($balls)
    {
        $this->balls = $balls;
        return $this;
    }
    
      
    /**
     * @return string
     */
    public function getBerdYear()
    {
        return $this->berd_year;
    }
    
    /**
     * @param string $berd_year
     *
     * @return $this
     */
    public function setBerdYear($berd_year)
    {
        $this->berd_year = $berd_year;
        return $this;
    }
    
    

      /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }
    
    /**
     * @param string $place
     *
     * @return $this
     */
    public function setPlace($place)
    {
        $this->place = $place;
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
    
    /**
     * Save a question.
     *
     * @return bool
     */
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
        
        $query= "INSERT INTO users (`name`,`seurname`,`sex`,`mygroup`,`email`,`balls`,`berd_year`,`place`) " . "VALUES ('$name','$seurname','$sex','$mygroup','$email','$balls','$berd_year','$place');";
    
        $result=$db->query($query);
        if (!$result) {die($db->error);}
        
        $this->setId($db->insert_id);
        return true;
    }
    
    public function getByEmail()
    {
        $db = DB::getInstance();
        $email =$this->clean($this->escape($this->getEmail()));
        $query="SELECT `id`,`name`,`seurname`,`sex`,`mygroup`,`email`,`balls`,`berd_year`,`place` FROM `users` WHERE email = '$email' LIMIT 1";
        $result=$db->query($query);
        if (!$result) {die($db->error);}
        $row = $result->fetch_assoc();
        return $row;
    }
    
    
}
