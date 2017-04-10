<?php
class User
{
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    
    public function __construct($firstname,$lastname,$email,$phone)
    {
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $this->setEmail($email);
        $this->setPhone($phone);
        
        $this->getFirstname();
        $this->getLastname();
        $this->getEmail();
        $this->getPhone();
    }
    
    public function setFirstname($firstname){$this->firstname=$firstname;}
    public function getFirstname(){echo $this->firstname;}
   
    public function setLastname($lastname){$this->lastname=$lastname;}
    public function getLastname(){echo $this->lastname;}
    
    public function setEmail($email){$this->email=$email;}
    public function getEmail(){echo $this->email;}
    
    public function setPhone($phone){$this->phone=$phone;}
    public function getPhone(){$this->phone;}
}

//$newUser=new User();
//$newUser->setFirstname('Дима');
//$newUser->getFirstname();


$userTwo= new User($firstname="Денис", $lastname="Попов", $email="mail@mail.com", $phone="123432145");


