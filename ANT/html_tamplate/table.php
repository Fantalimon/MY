

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


echo "<pre>";
    var_dump( $mygroupDESC );
echo "</pre>";


?>

<div class="container-fluid col-sm-offset-2 col-sm-8 ">
        <table class="table text-center">
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>E-mail</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Иван</td>
                <td>Чмель</td>
                <td>ivan@mail.ru</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Петр</td>
                <td>Щербаков</td>
                <td>petr@mail.ru</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Юрий</td>
                <td>Голов</td>
                <td>yuri@mail.ru</td>
            </tr>
            </tbody>
        </table>
    </div>
