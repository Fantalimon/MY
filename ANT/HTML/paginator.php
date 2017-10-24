<div class="row">
    <div class="navbar text-center ">
        <ul class="navbar-form navbar-fixed-bottom">
            <ul id="page" class="pagination">
            
            </ul>
    </div>
</div>

<!--два файла один лежит в /data.php-->
<!--второй файл лежит в /HTML/paginator.php-->
<!--между ними не передаются $_GET запросы.-->
<!--Если подключить data.php  realpath(__DIR__).'/data.php' в файл /HTML/paginator.php то запросы проходят.-->
<!--Но отображаются echo json_encode($response); Как быть?-->
