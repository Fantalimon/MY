<?php
require_once 'autoload.php';

$status='';
$find='';
$response=[];

$page = isset($_POST['page']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['page']))), 0, 20, 'UTF-8') : 1;


$pageinlist = PAGEINLIST;


$find = isset($_POST['find']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['find']))), 0,20,'UTF-8') : '';


$status = isset($_POST['status']) ? mb_substr(htmlspecialchars(strip_tags(trim($_POST['status']))), 0,20,'UTF-8') : '';


if(!empty($find)){
    $field=new Find($find);
}else {
    $field = new Scroll($page, $pageinlist);
}


switch ($status){
    case 'nameUP':
        $response['nameASC'] = $field->show(((new Query())->order('name')->ASC()->bild()));
        break;
        
       case 'nameDOUN':
           $response['nameDESC']= $field->show(((new Query())->order('name')->DESC()->bild()));
        break;
        
        case 'ballsUP':
            $response['ballsASC'] = $field->show((((new Query())->order('balls')->ASC()->bild())));
        break;
        
        case 'ballsDOUN':
            $response['ballsDESC'] = $field->show(((new Query())->order('balls')->DESC()->bild()));
        break;
        
        case 'mygroupUP':
            $response['mygroupASC'] = $field->show(((new Query())->order('mygroup')->ASC()->bild()));
        break;
        
        case 'mygroupDOUN':
            $response['mygroupDESC'] = $field->show(((new Query())->order('mygroup')->DESC()->bild()));
        break;
        
        case 'seurnameUP':
            $response['seurnameASC'] = $field->show(((new Query())->order('seurname')->ASC()->bild()));
        break;
        
        case 'seurnameDOUN':
            $response['seurnameDESC'] = $field->show(((new Query())->order('seurname')->DESC()->bild()));
        break;
    default:
             $response['ballsDESC'] = $field->show(((new Query())->order('balls')->DESC()->bild()));
       
}

$response['pages']=$field->Pages();

echo json_encode($response);



