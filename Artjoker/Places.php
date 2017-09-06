<?php

require_once 'autoload.php';

/**
 * ${CLASS_NAME}
 *
 * @category  Cgi
 * @package   ${PARAM_DOC}
 * @author    CGI <info.de@cgi.com>
 * @copyright 2016 CGI
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.de.cgi.com/
 */
class Places extends Entyty
{
    public function getReg_id()
    {
        $db = DB::getInstance();
    
        $query="SELECT ter_address, reg_id FROM t_koatuu_tree where ter_type_id = 0 AND ter_pid <=> NULL";
        
        $result=$db->query($query);
        if (!$result) {die($db->error);}
                while($row = $result->fetch_assoc()){
                    echo "<option value='".$row['reg_id'].' '.$row['ter_address']."'>".$row['ter_address']."</option>";
                } ;
                echo "<br>";
        return ;
     
    }
    
    public function qualiTowns($territory)
    {
        $territory=mb_substr($territory, 0,2);
        $territory=(int)$territory;
        $territory=$this->clean($territory);
        $territory=$this->escape($territory);
        
        $db = DB::getInstance();
        $query="SELECT ter_name,ter_address,ter_type_id,ter_level,ter_mask,reg_id FROM t_koatuu_tree where reg_id  = ".$territory." AND t_koatuu_tree.ter_type_id =1";
        
        $result=$db->query($query);
        if (!$result) {die($db->error);}
        $json=[];
        while($row = $result->fetch_assoc()){
            $ter= htmlspecialchars($row['ter_name'], ENT_QUOTES, 'UTF-8');
            $json["$ter"]=$ter;
        } ;
        return $json;
    }
    
    public function qualiRayonsTowns($territory,$terrytoryStr)
    {
        $territory=mb_substr($territory, 0,2);
        $territory=(int)$territory;
        $territory=$this->clean($territory);
        $territory=$this->escape($territory);
        $terrytoryStr=(string)$terrytoryStr;
        $terrytoryStr=$this->clean($terrytoryStr);
        $terrytoryStr=$this->escape($terrytoryStr);
        
        $db = DB::getInstance();
        $query="SELECT ter_name,ter_address,ter_type_id,ter_level,ter_mask,reg_id FROM t_koatuu_tree where reg_id  = ".$territory." AND ter_address LIKE '%".$terrytoryStr."%'AND ter_type_id = 3 ";
        
        $result=$db->query($query);
        if (!$result) {die($db->error);}
        $json=[];
                    while($row = $result->fetch_assoc()){
                         $ter= htmlspecialchars($row['ter_name'], ENT_QUOTES, 'UTF-8');
                        $json["$ter"]=$ter;
                    } ;
        return $json;
    }
    
    public function qualiRayons($territory)
    {
        $territory=mb_substr($territory, 0,2);
        $territory=(int)$territory;
        $territory=$this->clean($territory);
        $territory=$this->escape($territory);
        
        
        $db = DB::getInstance();
        $query="SELECT ter_name,ter_address,ter_type_id,ter_level,ter_mask,reg_id FROM t_koatuu_tree where reg_id  = ".$territory." AND t_koatuu_tree.ter_type_id = 2";
        
        $result=$db->query($query);
        if (!$result) {die($db->error);}
        $json=[];
        while($row = $result->fetch_assoc()){
            $ter= htmlspecialchars($row['ter_name'], ENT_QUOTES, 'UTF-8');
            $json["$ter"]=$ter;
        } ;
        return $json;
    }
    
    public function qualiSMT($territory,$terrytoryStr)
    {
        $territory=(int)$territory;
        $territory=$this->clean($territory);
        $territory=$this->escape($territory);
        $terrytoryStr=(string)$terrytoryStr;
        $terrytoryStr=$this->clean($terrytoryStr);
        $terrytoryStr=$this->escape($terrytoryStr);
        
        $db = DB::getInstance();
        
        $query="SELECT ter_name,ter_address,ter_type_id,ter_level,ter_mask,reg_id FROM t_koatuu_tree where reg_id  = ".$territory." AND ter_address LIKE '%".$terrytoryStr."%' AND t_koatuu_tree.ter_type_id >3;";
    
   $result=$db->query($query);
        if (!$result) {die($db->error);}
        $json=[];
        while($row = $result->fetch_assoc()){
            $ter = htmlspecialchars($row['ter_name'], ENT_QUOTES, 'UTF-8');
            $json["$ter"]=$ter;
        } ;
         return $json;
    }
    
    public function qualiTawnsRayons($territory)
    {
        $territory=(int)$territory;
        $territory=$this->clean($territory);
        $territory=$this->escape($territory);
    
        
        $db = DB::getInstance();
        $query="SELECT ter_type_id  FROM t_koatuu_tree where reg_id  = ".$territory."  AND t_koatuu_tree.ter_type_id = 3";
        
   $result=$db->query($query);
     
        if (!$result) {die($db->error);}
        $row = $result->num_rows;
        return $row;
    }
    


}
