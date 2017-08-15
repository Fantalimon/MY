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
        $nul=NULL;
        $query ="SELECT  ter_address, reg_id FROM t_koatuu_tree where ter_pid <=> NULL";
    
        $result = $db->query($query);
        
        while($row = $result->fetch_assoc()){
        echo "<option value=".$row['reg_id'].'='.">".$row['ter_address']."</option>";
        } ;
        
//        echo "<h1>".'Подсчитанно колличество областей'."</h1>";
        echo "<br>";
    
        if (!$result) {
            die($db->error);
        }
        return ;
    }
    
    public function qualiTawns($territory,$terrytoryStr)
    {
    
        $territory=(int)$territory;
        $terrytoryStr=mb_substr($terrytoryStr, 0,7);
        
        $db = DB::getInstance();
        
        
        $query ="SELECT ter_name,ter_address,ter_type_id,ter_level,ter_mask,reg_id FROM t_koatuu_tree where reg_id  = ".$territory." AND ter_address LIKE '%".$terrytoryStr."%' AND t_koatuu_tree.ter_type_id LIKE 1";
        
        $result = $db->query($query);
        echo "<br>";
        echo "<select value=''>";
        while($row = $result->fetch_assoc()){
            echo "<option value=".$row['ter_type_id'].'='.">".$row['ter_name']."</option>";
        } ;
        echo "</select>";
        echo "<br>";
        
        if (!$result) {
            die($db->error);
        }
        
        return ;
    }
    
    public function qualiRayons($territory,$terrytoryStr)
    {
        $territory=(int)$territory;
        $terrytoryStr=mb_substr($terrytoryStr, 0,7);
        
        $db = DB::getInstance();
        
        $query ="SELECT ter_name,ter_address,ter_type_id,ter_level,ter_mask,reg_id FROM t_koatuu_tree where reg_id  = ".$territory." AND ter_address LIKE '%".$terrytoryStr."%' AND t_koatuu_tree.ter_type_id LIKE 2";
        
        
        $result = $db->query($query);
    
        echo "<br>";
        echo "<select value=''>";
        while($row = $result->fetch_assoc()){
            echo "<option value=".$row['ter_type_id'].'='.">".$row['ter_name']."</option>";
        } ;
        echo "</select>";
        echo "<br>";
    
        if (!$result) {
            die($db->error);
        }
        return ;
    }
    
    
    
/*    public function qualiTaunsRayons($territory,$terrytoryStr)
    {
        $territory=(int)$territory;
        $terrytoryStr=mb_substr($terrytoryStr, 0,7);
        
        $db = DB::getInstance();
        
        $query ="SELECT ter_name,ter_address,ter_type_id,ter_level,ter_mask,reg_id FROM t_koatuu_tree where reg_id  = ".$territory." AND ter_address LIKE '%".$terrytoryStr."%' AND t_koatuu_tree.ter_type_id LIKE 3";
        
        $result = $db->query($query);
        
        while($row = $result->fetch_assoc()){
            $taunsRayons[$row['ter_name']]=$row['ter_type_id'];
        } ;
        
        if (!$result) {
            die($db->error);
        }
        return $taunsRayons;
    }*/

}
