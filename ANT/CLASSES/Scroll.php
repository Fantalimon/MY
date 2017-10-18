<?php
require_once 'autoload.php';

class Scroll extends Entyty
{
   public function show(){
       $db=DB::getInstance();
       $query="SELECT `name`, `seurname`,`group`,`balls` FROM users ORDER BY balls DESC";
       $result=$db->query($query);
       if (!$result) {die($db->error);}
//       $json=[];
       while ($row=$result->fetch_assoc()){
//           $json['name']=$row['name'];
//           $json['seurname']=$row['seurname'];
//           $json['group']=$row['group'];
//           $json['balls']=$row['balls'];
           
       }
       return $row;
//      return $json;
   }
}
