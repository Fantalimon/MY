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
        
        $query ="SELECT  ter_address, reg_id FROM t_koatuu_tree where ter_pid <=> NULL ";
    
        $result = $db->query($query);
        
        while($row = $result->fetch_assoc()){
         $temp[$row['ter_address']]=$row['reg_id'];
        } ;
        
        echo "<h1>".'Подсчитанно колличество областей'."</h1>";
        echo "<br>";
    
        if (!$result) {
            die($db->error);
        }
        return $temp ;
    }
    
    public function qualification($territory,$terrytoryStr)
    {
        $territory=(int)$territory;
        $terrytoryStr=substr($terrytoryStr, 0,7);
        
        $db = DB::getInstance();
        
        $query ="SELECT ter_name,ter_address,ter_type_id,ter_level,ter_mask,reg_id FROM t_koatuu_tree where reg_id  = $territory AND ter_address LIKE '%$terrytoryStr%' AND t_koatuu_tree.ter_type_id LIKE 1";
        
        $result = $db->query($query);
        
        while($row = $result->fetch_assoc()){
            $tempTauns[]=$row['ter_name'];
        } ;
        
        echo "<h2>".'Подсчитанно колличество городов'."</h2>";
        echo "<br>";
        if (!$result) {
            die($db->error);
        }
        return $tempTauns ;
    }
    
    public function mainqualification($territory,$terrytoryStr)
    {
        $territory=(int)$territory;// кода городов 63 например код Харькова
        $terrytoryStr=substr($terrytoryStr, 0,5); // это текстовое представление города
        
        $db = DB::getInstance();
        
        $query ="SELECT ter_name,ter_address,ter_type_id,ter_level,ter_mask,reg_id FROM t_koatuu_tree where reg_id  = $territory AND ter_address LIKE '%$terrytoryStr%' AND t_koatuu_tree.ter_type_id LIKE 2";
        
        $result = $db->query($query);
        
        while($row = $result->fetch_assoc()){
            $tempRayons[]=$row['ter_name'];
        } ;
    
        echo "<h3>".'Подсчитанно колличество районов'."</h3>";
        echo "<br>";
        if (!$result) {
            die($db->error);
        }
        return $tempRayons;
    }

}
