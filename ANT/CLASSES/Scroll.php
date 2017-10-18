<?php

require_once 'autoload.php';

class Scroll extends Entyty
{
    
    public function show($wquery)
    {
        $db = DB::getInstance();
        $query="SELECT `name`, `seurname`,`mygroup`,`balls` FROM users".$wquery;
        $result = $db->query($query);
        if (!$result) {
            die($db->error);
        }
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
