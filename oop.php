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
echo "<br>";
echo "<br>";
echo "<br>";
class Calculator
{
     public $num1;
     public $num2;
     
     public function Sum ($num1,$num2) {return $this->num1=$num1+$this->num2=$num2;}
     
     public function Min($num1,$num2){return $this->num1=$num1-$this->num2=$num2;}
     
     public function Multiplication ($num1,$num2){return $this->num1=$num1*$this->num2=$num2;}
     
     public function Division ($num1,$num2){return $this->num1=$num1/$this->num2=$num2;}
    
}
  
$ferstOperation=new Calculator();
echo "<br>";
echo "Сумма: ". $ferstOperation->Sum(1,1);
echo "<br>";
echo "Вычитание: ". $ferstOperation->Min(10, 9);
echo "<br>";
echo "Умножение ".$ferstOperation->Multiplication(100, 100);
echo "<br>";
echo "Деление ".$ferstOperation->Division(50, 2);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


class Shell
{

 /*   private $request_uri='REQUEST_URI';
    private $ip='REMOTE_ADDR';
    private $document_root='DOCUMENT_ROOT';
    private $http_host='HTTP_HOST';
    private $http_user_agent='HTTP_USER_AGENT';
    private $query_string='QUERY_STRING';*/

   private $serverData;
    
    
    public function __construct($server)
    {
     $this->serverdata=$server;
    }
    public function getRequestUri(){return $this->serverdata['REQUEST_URI'];}

}

$four=new Shell($_SERVER);
echo $requestUri=$four->getRequestUri();
//echo $_SERVER['REQUEST_URI'];


