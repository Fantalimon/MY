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
        
    }
    
    public function setFirstname($firstname){$this->firstname=$firstname;}
    public function getFirstname(){return $this->firstname;}
   
    public function setLastname($lastname){$this->lastname=$lastname;}
    public function getLastname(){return $this->lastname;}
    
    public function setEmail($email){$this->email=$email;}
    public function getEmail(){return $this->email;}
    
    public function setPhone($phone){$this->phone=$phone;}
    public function getPhone(){return $this->phone;}
    
    public function getUserInfo(){

        $arr=[
            'ferstname'=>$this->getFirstname(),
             'lastname'=>$this->getLastname(),
               'email'=>$this->getEmail(),
                 'phone'=>$this->getPhone()
             ];
        print_r($arr);
    }
    
}

//$newUser=new User();
//$newUser->setFirstname('Дима');
//$newUser->getFirstname();


$userTwo= new User("Денис ", " Попов ", " mail@mail.com ", " 123432145");
echo "<br>";
$userTwo->getUserInfo();
