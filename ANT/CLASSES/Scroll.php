<?php

class Scroll extends Entyty
{
   public function show(){
       $db=DB::getInstance();
       $query="SELECT `name`, `seurname`,`group`,`balls` FROM users ORDER BY balls DESC";
       $result=$db->query($query);
       if (!$result) {die($db->error);}
       $json=[];
       while ($row=$result->fetch_assoc()){
           $json[]=$row;
       }
      return $json;
   }
}
