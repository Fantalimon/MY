<?php

require_once 'Entyty.php';

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
    
        echo "<h1>".'Подсчитанно колличество областей'."</h1>";
    
        if (!$result) {
            die($db->error);
        }
        return true;
    }
}
