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
        
        $query="CREATE TEMPORARY TABLE IF NOT EXISTS `id_regions`  SELECT ter_address, reg_id FROM t_koatuu_tree where ter_type_id = 0 AND ter_pid <=> NULL;";
        
        $query.="SELECT * FROM `id_regions`;";
    
        
       if ($db->multi_query($query)){
        do{
            if($result=$db->store_result())
            {
                while($row = $result->fetch_assoc()){
                    echo "<option value='".$row['reg_id']."'>".$row['ter_address']."</option>";
                } ;
                echo "<br>";
             
                $result->free();
            }
        } while($db->next_result());
       };
        return ;
    }
    
    
    
    
    public function qualiRayons($territory)
    {
        $territory=(int)$territory;
        
        $db = DB::getInstance();
        
        $query="CREATE TEMPORARY TABLE IF NOT EXISTS `".$territory."` SELECT ter_name,ter_address,ter_type_id,ter_level,ter_mask,reg_id FROM t_koatuu_tree where reg_id  = ".$territory." AND t_koatuu_tree.ter_type_id BETWEEN 2 and 3;";
        
        $query.="SELECT * FROM `".$territory."`;";
    
        if ($db->multi_query($query)){
            do{
                if($result=$db->store_result())
                { echo "<br>";
                    echo "<select id='selectRayons'>";
                    while($row = $result->fetch_assoc()){
                        echo "<option value='".$row["ter_name"]."'>".$row['ter_name']."</option>";
                    } ;
                    echo "</select>";
                    echo "<br>";
                
                    $result->free();
                }
            } while($db->next_result());
        };
        return ;
    }
    
    public function qualiTawns($territory,$terrytoryStr)
    {
        
        $territory=(int)$territory;
        $terrytoryStr=(string)$terrytoryStr;
        $db = DB::getInstance();
        
        
        $query ="SELECT ter_name,ter_address,ter_type_id,ter_level,ter_mask,reg_id FROM t_koatuu_tree where reg_id  = ".$territory." AND ter_address LIKE '%".$terrytoryStr."%' AND t_koatuu_tree.ter_type_id NOT BETWEEN 2 and 3 ORDER BY ter_type_id ,ter_mask ASC ";
        
        
        
        $result = $db->query($query);
        
        echo "<br>";
        echo "<select id='selectTowns' >";
        while($row = $result->fetch_assoc()){
            echo "<option value='".$row["ter_name"]."'>".$row['ter_name']."</option>";
        } ;
        echo "</select>";
        echo "<br>";
        
        if (!$result) {
            die($db->error);
        }
        return ;
    }
}
