<?php
class User
{
    public $name;
    public $lastname;
    public $email;
    public $phone;
    
    public function setName($name){$this->name=$name;}
    public function getName(){echo $this->name;}
   
    public function setLastname($lastname){$this->lastname=$lastname;}
    public function getLastname(){echo $this->lastname;}
    
    public function setEmail($email){$this->email=$email;}
    public function getEmail(){echo $this->email;}
    
    public function setPhone($phone){$this->phone=$phone;}
    public function getPhone(){$this->phone;}
}

$newUser=new User();
$newUser->setName('Дима');
$newUser->getName();



