<?php


class Validator
{
    private $get = [];
    private $post = [];
    private $request = [];
    private $cookies=[];
    
    public function __construct($request)
    {
        $this->request = $request;
        $this->handleRequest($this->request);
    }
    
    
    //strip_tags and trim
    private function delTagsAnddelGaps()
    {
        $param=[];
        foreach ($this->request as $item) {$param[]=trim(strip_tags($item));}
        return $param;
    }
    
    
    private function handleRequest()
    {
        
        if (($_SERVER['REQUEST_METHOD']) === 'GET') {$this->get = $this->delTagsAnddelGaps();}
        
        elseif(($_SERVER['REQUEST_METHOD']) === 'POST') {$this->post = $this->delTagsAnddelGaps();}
        
        elseif (($_SERVER['REQUEST_METHOD']) === 'COOKIES'){$this->cookies = $this->delTagsAnddelGaps();}
        
    }
    
    
    public function getParams()
    {
        if (!empty($this->get)) {
            return $this->get;
        }
        elseif (!empty($this->post)){
            return $this->post;
        }
        elseif (!empty($this->cookies)){
            return $this->cookies;
        }
        else{return [];}
    }

public function getParamKeys($key)
{
        if(!empty($this->get))
        {
           if(isset($key) || array_key_exists($key,$this->get)){
              return $this->get[$key];
           }
        }
       elseif(!empty($this->post)){
           if(isset($key) || array_key_exists($key,$this->post)){
               return $this->post[$key];
           }
        }
        elseif(!empty($this->cookies)){
           if(isset($key) || array_key_exists($key,$this->cookies)){
               return $this->cookies[$key];
           }
        }
        else {return [];}

}
    
    
}

$p = ["<br><p><h1>    Hello  </h1></p>", "I                  ","   COOKIE`s"];

setcookie('Val_C',serialize($p));
$do = new Validator($p);
print_r($do->getParams());
echo "<br>";
echo "<br>";
echo "<br>";
echo ($do->getParamKeys(0));
