<?php
require_once 'autoload.php';

$field = new Scroll();

$status='';
$response=[];

$status = isset($_POST['status']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['status']))), 0,20,'UTF-8') : '';

switch ($status){
    case 'nameUP':
        $response['nameASC'] = $field->show((new Query())->order('name')->ASC()->bild());
        break;
        
       case 'nameDOUN':
           $response['nameDESC']= $field->show((new Query())->order('name')->DESC()->bild());
        break;
        
        case 'ballsUP':
            $response['ballsASC'] = $field->show((new Query())->order('balls')->ASC()->bild());
        break;
        
        case 'ballsDOUN':
            $response['ballsDESC'] = $field->show((new Query())->order('balls')->DESC()->bild());
        break;
        
        case 'mygroupUP':
            $response['mygroupASC'] = $field->show((new Query())->order('mygroup')->ASC()->bild());
        break;
        
        case 'mygroupDOUN':
            $response['mygroupDESC'] = $field->show((new Query())->order('mygroup')->DESC()->bild());
        break;
        
        case 'seurnameUP':
            $response['seurnameASC'] = $field->show((new Query())->order('seurname')->ASC()->bild());
        break;
        
        case 'seurnameDOUN':
            $response['seurnameDESC'] = $field->show((new Query())->order('seurname')->DESC()->bild());
        break;
    default:
        $response['ballsDESC'] = $field->show((new Query())->order('balls')->DESC()->bild());
}

echo json_encode($response);
