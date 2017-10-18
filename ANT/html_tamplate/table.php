

<?php
require_once 'autoload.php';

$field=new Scroll();
$nameASC=$field->show((new Query())->order('name')->ASK()->bild());
$nameDESC=$field->show((new Query())->order('name')->DESC()->bild());

$ballsASC=$field->show((new Query())->order('balls')->ASK()->bild());
$ballsDESC=$field->show((new Query())->order('balls')->DESC()->bild());

$seurnameASC=$field->show((new Query())->order('seurname')->ASK()->bild());
$seurnameDESC=$field->show((new Query())->order('seurname')->DESC()->bild());

$mygroupASC=$field->show((new Query())->order('mygroup')->ASK()->bild());
$mygroupDESC=$field->show((new Query())->order('mygroup')->DESC()->bild());

//echo "<pre>";
//    var_dump($ballsDESC);
//echo "</pre>";

$ctn=count($ballsDESC);
?>

<div class="container-fluid col-sm-offset-2 col-sm-8 ">
        <table class="table text-center">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Группа</th>
                <th>Баллы</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for($i=0;$i<$ctn;$i++):
            ?>
            <tr>
                <td><?php echo $ballsDESC[$i]['name'] ?></td>
                <td><?php echo $ballsDESC[$i]['seurname'] ?></td>
                <td><?php  echo $ballsDESC[$i]['mygroup'] ?></td>
                <td><?php  echo $ballsDESC[$i]['balls']  ?></td>
            </tr>
            <?php endfor; ?>
            </tbody>
        </table>
    </div>
