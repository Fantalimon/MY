<?php
require_once 'Entyty.php';

class User extends Entyty implements Serializable
{

    
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var string
     */
    private $email;
    
    /**
     * @var string
     */
    private $territory;
    
    
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
        if (isset($userData['email'])) {
            $this->setEmail($userData['email']);
        }
        if (isset($userData['territory'])) {
            $this->setTerritory($userData['territory']);
        }
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
        $this-> name = $name;
        
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
    public function getTerritory()
    {
        return $this->territory;
    }
    
    /**
     * @param string $territory
     *
     * @return $this
     */
    public function setTerritory($territory)
    {
        $this->territory = $territory;
        
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
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'territory' => $this->getTerritory()
            
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
            ->setName($userInfo['name'])
            ->setEmail($userInfo['email'])
            ->setTerritory($userInfo['territory']);
    }
    
    /**
     * Save a question.
     *
     * @return bool
     */
    public function save()
    {
        // получение экземпляра класса DB
        $db = DB::getInstance();
        
        // экранирование переменных
        $name = $this->escape($this->getName());
        $email = $this->escape($this->getEmail());
        $territory = $this->escape($this->getTerritory());
 
        
        // подготовка запроса
        $query = "INSERT INTO users (`name`,`email`,`territory`) " . "VALUES ('$name','$email','$territory')";
        
        // выполнение запроса
        $result = $db->query($query);
        $time=1;
        header("Refresh:$time; url=".SITE);
        echo "<h1>".'Ура оно работает!!!'."</h1>";
        
        if (!$result) {
            die($db->error);
        }
        
        return true;
    }
    
    
}
