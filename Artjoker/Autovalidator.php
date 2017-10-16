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
class Autovalidator extends Entyty
{
    private $reg_id;
    private $territor;
    
    public function getTer(){
        $ctn=count($this->reg_id) - 1;
        $this->territor=(int)$this->escape($this->clean($this->reg_id[mt_rand(0,$ctn)]));
        return $this;
    }
    
    
    public function getReg()
    {
        $db = DB::getInstance();
        
        $query = "SELECT ter_address, reg_id FROM t_koatuu_tree where ter_type_id = 0 AND ter_pid <=> NULL AND reg_id < 80";
        
        $result = $db->query($query);
        
        if (!$result) {
            die($db->error);
        }
        
        $reg_id = [];
        while ($row = $result->fetch_assoc()) {
            $reg_id[] = $row['reg_id'];
        };
         $this->reg_id=$reg_id;
         return $this;
         
    }
    
    public function AutoqualiOblast()
    {
        
        $territory=$this->territor;
        
        $db = DB::getInstance();
        $query = "SELECT ter_address,reg_id FROM t_koatuu_tree where reg_id  = " . $territory
            . " AND ter_type_id = 0 AND ter_pid <=> NULL";
        
        $result = $db->query($query);
        if (!$result) {
            die($db->error);
        }
        $obl = [];
        while ($row = $result->fetch_assoc()) {
            $ter = htmlspecialchars($row['ter_address'], ENT_QUOTES, 'UTF-8');
            $obl[] = $ter;
        };
        $oblast=$this->escape($this->clean($obl[mt_rand(0, count($obl) - 1)]));
        
        return $oblast;
    }

    public function count()
    {

        $db = DB::getInstance();
        $query = "SELECT COUNT(*) FROM users ";

        $result = $db->query($query);
        if (!$result) {
            die($db->error);
        }
        while ($row = $result->fetch_assoc()) {
            $ter = htmlspecialchars($row['COUNT(*)'], ENT_QUOTES, 'UTF-8');
        };
        return $ter;
    }

//    public function AutoqualiRayons()
//    {
//        $territory=$this->territor;
//        $db = DB::getInstance();
//
//        $query = "SELECT ter_name,ter_type_id,reg_id FROM t_koatuu_tree where reg_id  = "
//            . $territory . " AND t_koatuu_tree.ter_type_id = 2";
//
//        $result = $db->query($query);
//        if (!$result) {
//            die($db->error);
//        }
//        $rayons = [];
//        while ($row = $result->fetch_assoc()) {
//            $ter = htmlspecialchars($row['ter_name'], ENT_QUOTES, 'UTF-8');
//            $rayons[] = $ter;
//        };
//        $rayon=$this->escape($this->clean($rayons[mt_rand(0, count($rayons) - 1)]));
//        return $rayon;
//    }
//
    public function UnionSelect()
    {
        $territory=$this->territor;
        $db = DB::getInstance();
    
        $query = "
SELECT `ter_name`,`ter_type_id`,`reg_id` FROM `t_koatuu_tree` where `reg_id`  = ".$territory."
AND `ter_type_id` = 0 
union ALL
SELECT `ter_name`,`ter_type_id`,`reg_id` FROM `t_koatuu_tree` where `reg_id`  = ".$territory." AND `ter_type_id` =1
union ALL
SELECT `ter_name`,`ter_type_id`,`reg_id` FROM `t_koatuu_tree` where `reg_id`  = ".$territory." AND `ter_type_id`= 2";
    
        $result = $db->query($query);
        if (!$result) {
            die($db->error);
        }
        
        $rayons = [];
        
        while ($row = $result->fetch_assoc()) {
            
            if ($row['ter_type_id'] == 0) {
                $x = htmlspecialchars($row['ter_name'], ENT_QUOTES, 'UTF-8');
                $rayons['ter'][] = $x;
            } elseif ($row['ter_type_id'] == 1) {
                $y = htmlspecialchars($row['ter_name'], ENT_QUOTES, 'UTF-8');
                $rayons['ter_town'][] = $y;
            } elseif ($row['ter_type_id'] == 2) {
                $z = htmlspecialchars($row['ter_name'], ENT_QUOTES, 'UTF-8');
                $rayons['ter_ray'][] = $z;
            }
        }
    
        $rayon = $rayons['ter'][0] . ' ' . $rayons['ter_town'][mt_rand(
                0, count($rayons['ter_town']) - 1
            )] . ' ' . $rayons['ter_ray'][mt_rand(0, count($rayons['ter_ray']) - 1)];
        
        return $rayon;
    }
    
    
    public function Autoname()
    {
        
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ';
        $generate_string = '';
        $length = rand(1, 25);
        
        for ($x = 0; $x < $length; $x++) {
            $i = rand(0, 28);
            $generate_string .= $chars{$i};
        };
        
        return $generate_string;
    }
    
    public function Autoemail()
    {
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ0123456789!#$%&_{|}()';
        $generate_string = '';
        $length = rand(1, 30);
        
        for ($x = 0; $x < $length; $x++) {
            $i = rand(0, 49);
            $generate_string .= $chars{$i};
        }
        
        return  $generate_string;
    }
    
    public function Autodomen()
    {
        $chars = 'abdefhiknrstyz';
        $generate_string = '';
        $length = rand(2, 4);
        
        for ($x = 0; $x < $length; $x++) {
            $i = rand(2, 13);
            $generate_string .= $chars{$i};
            
        }
        
        return $generate_string;
    }
    
    public function Autoheaddomen()
    {
        $chars = 'abdefhiknrstyz';
        $generate_string = '';
        $length = rand(2, 4);
        
        for ($x = 0; $x < $length; $x++) {
            $i = rand(2, 13);
            $generate_string .= $chars{$i};
            
        }
        
        return $generate_string;
    }
    
 
}
