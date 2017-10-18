<?php
require_once 'autoload.php';

$field = new Scroll();
$nameASC = $field->show((new Query())->order('name')->ASK()->bild());
$nameDESC = $field->show((new Query())->order('name')->DESC()->bild());

$ballsASC = $field->show((new Query())->order('balls')->ASK()->bild());
$ballsDESC = $field->show((new Query())->order('balls')->DESC()->bild());

$seurnameASC = $field->show((new Query())->order('seurname')->ASK()->bild());
$seurnameDESC = $field->show((new Query())->order('seurname')->DESC()->bild());

$mygroupASC = $field->show((new Query())->order('mygroup')->ASK()->bild());
$mygroupDESC = $field->show((new Query())->order('mygroup')->DESC()->bild());

?>

<div class="container-fluid col-sm-offset-2 col-sm-8 ">
    <table class="table text-center">
        <thead>
        <tr>
            <th><span id="nameUP">&#9650;</span>Имя<span id="nameDOUN">&#9660;</span></th>
            <th><span id="seurnameUP">&#9650;</span>Фамилия<span id="seurnameDOUN">&#9660;</span></th>
            <th><span id="mygroupUP">&#9650;</span>Группа<span id="mygroupDOUN">&#9660;</span></th>
            <th><span id="ballsUP">&#9650;</span>Баллы<span id="ballsDOUN">&#9660;</span></th>
        </tr>
        </thead>
        <tbody>
        
        <?php
        $ctn = count($ballsDESC);
        for ($i = 0; $i < $ctn; $i++):
            ?>
        
            <tr>
                <td><?php echo $ballsDESC[$i]['name'] ?></td>
                <td><?php echo $ballsDESC[$i]['seurname'] ?></td>
                <td><?php echo $ballsDESC[$i]['mygroup'] ?></td>
                <td><?php echo $ballsDESC[$i]['balls'] ?></td>
            </tr>
        
        <?php endfor; ?>
        
        </tbody>
    </table>
</div>
