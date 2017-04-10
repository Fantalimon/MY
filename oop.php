<?php
class User
{
    public $name;
    public function setName($name){$this->name=$name;}
    public function getName(){echo $this->name;}
}

$newUser=new User();
$newUser->setName('Дима');
$newUser->getName();
