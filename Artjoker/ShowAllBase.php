<?php

include_once 'autoload.php';

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
class ShowAllBase extends Entyty
{
    public function showallbase()
    {
        $bd=DB::getInstance();
        $querynshow="SELECT * FROM t_koatuu_tree";
        $resultshow=$bd->query($querynshow);
    
        echo "<table>";
        while($rowshow = $resultshow->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$rowshow['ter_id']."</td>";
            echo "<td>".$rowshow['ter_pid']."</td>";
            echo "<td>".$rowshow['ter_name']."</td>";
            echo "<td>".$rowshow['ter_address']."</td>";
            echo "<td>".$rowshow['ter_type_id']."</td>";
            echo "<td>".$rowshow['ter_level']."</td>";
            echo "<td>".$rowshow['ter_mask']."</td>";
            echo "<td>".$rowshow['reg_id']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        return ;
    }
}
