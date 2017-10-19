<?php
require_once 'autoload.php';

$field = new Scroll();

$nameASC = $field->show((new Query())->order('name')->ASC()->bild());
$nameDESC = $field->show((new Query())->order('name')->DESC()->bild());

$ballsASC = $field->show((new Query())->order('balls')->ASC()->bild());
$ballsDESC = $field->show((new Query())->order('balls')->DESC()->bild());

$seurnameASC = $field->show((new Query())->order('seurname')->ASC()->bild());
$seurnameDESC = $field->show((new Query())->order('seurname')->DESC()->bild());

$mygroupASC = $field->show((new Query())->order('mygroup')->ASC()->bild());
$mygroupDESC = $field->show((new Query())->order('mygroup')->DESC()->bild());


$response=[];

$response['nameASC']=$nameASC;
$response['nameDESC']=$nameDESC;

$response['ballsASC']=$ballsASC;
$response['ballsDESC']=$ballsDESC;

$response['seurnameASC']=$seurnameASC;
$response['seurnameDESC']=$seurnameDESC;

$response['mygroupASC']=$mygroupASC;
$response['mygroupDESC']=$mygroupDESC;

echo json_encode($response);
