<div class="row">
<div class="container-fluid col-xs-offset-2 col-xs-10 ">
    <div class="navbar">
        <div class="navbar-form navbar-fixed-top">
    
            <?php
                if (empty($_SESSION['userdata'])) {
                    echo "<button id='Sing' type='button' class='btn btn-sm btn-primary'>Регистрация</button>";
                } else {
                    echo "<button id=\"Rerayt\" type=\"button\" class=\"btn btn-sm btn-danger\">Редактирование</button>";
                }
            ?>
            <form class="navbar-right"  role="search">
                <div class="form-group">
                    <input id="find" type="text" class="form-control input-sm" placeholder="что ищем?">
                </div>
                <button id="tofind" type="submit" class="btn btn-sm btn-success">Искать</button>
            </form>

        </div>
    </div>
</div>
</div>
