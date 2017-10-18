<?php

require_once 'autoload.php';

class Scroll extends Entyty
{
    public $Wquery=' ORDER BY balls DESC';
    
    public function show($wquery)
    {
        $db = DB::getInstance();
        $query="SELECT `name`, `seurname`,`mygroup`,`balls` FROM users".$wquery;
        $result = $db->query($query);
        if (!$result) {
            die($db->error);
        }
        $json = [];
        while ($row = $result->fetch_assoc()) {
            $json[] = [$row['name'],$row['seurname'],$row['group'],$row['balls']];
        }
        return $json;
    }
}
