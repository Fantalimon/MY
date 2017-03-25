<?php
function XtableY ($X = 25, $Y = 25 )
{
    $table="<table border='1px' width='100%'>";
    for($x=1;$x<=$X;$x++)
    {
        $table.= "<tr>";
        for ($y=1;$y<=$Y;$y++)
        {  if($x===1 || $y===1)
        {$table.= "<td style='background-color: crimson; font-size: 14px; margin:3px 3px; padding: 5px 5px; text-align: center;'>
".$x*$y."</td>";}
        else{$table.= "<td style='background-color: antiquewhite; font: italic bold 12px/1 Georgia,serif;margin:3px 3px; padding: 5px 5px; text-align: center;'>".$x*$y."</td>";}
        }
        $table.= "</tr>";
    }
    $table.= "</table>";
    return $table;
}
echo XtableY();
?>
