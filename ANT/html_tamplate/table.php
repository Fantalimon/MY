<?php
$users=new Scroll();
$all=$users->show();

?>

<div class="container-fluid col-sm-offset-2 col-sm-8 ">
    <div class="table-responsive">
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
</div>
