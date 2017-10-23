<?php

include_once BASE_PATH.'/autoload.php';

if(!isset($_SESSION['userdata'])){
    $id='';
    $name='';
    $seurname='';
    $mygroup='';
    $mail='';
    $balls='';
    $berd_year='';
    $place='';
}else {
    $user = unserialize($_SESSION['userdata']);
    $name = $user->getName();
    $seurname = $user->getSeurname();
    $mygroup = $user->getGroup();
    $mail = $user->getEmail();
    $balls = $user->getBalls();
    $berd_year = $user->getBerdYear();
    $place = $user->getPlace();
}

?>


<!--Модальлное окно изменений -->
<div id="Change" role="dialog" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Заголовок модального окна -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Поле для Изменений.</h4>
            </div>
            
            <!-- Основное содержимое модального окна -->
            <div class="modal-body">
                
                <form id="formchange" class="form-horizontal" method="post"  role="form">
                    
                    <div class="form-group">
                        <label for="name" class="col-xs-4 control-label">Ваше имя</label>
                        <div class="col-xs-7">
                            <input type="text" name="regname" class="form-control" id="chname" placeholder="<?php echo $name ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="seurname" class="col-xs-4 control-label">Ваша Фамилия</label>
                        <div class="col-xs-7">
                            <input type="text" name="regseurname" class="form-control" id="chseurname" placeholder="<?php echo $seurname; ?>"  >
                        </div>
                    </div>
                    
                    <div class="form-group" id="sex">
                        <label for="sexm" class="col-sm-4 col-sm-offset-2 radio">Мужчина</label>
                        <div class="col-sm-1">
                            <input type="radio" name="regsex" class="form-control " id="chsexm" value="1" checked/>
                        </div>
                        
                        <label for="sexw" class="col-sm-4 col-sm-offset-2 radio">Женщина</label>
                        <div class="col-sm-1">
                            <input type="radio" name="regsex" class="form-control " id="chsexw" value="0"/>
                        </div>
                    
                    </div>
                    
                    <div class="form-group">
                        <label for="group" class="col-xs-4 control-label">Ваша група</label>
                        <div class="col-xs-7">
                            <input type="text" name="reggroup" class="form-control" id="chgroup" placeholder="<?php echo $mygroup; ?>" >
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="email" class="col-xs-4 control-label">Ваша почта</label>
                        <div class="col-xs-7">
                            <input type="text" name="regemail" class="form-control" id="chemail" placeholder="<?php echo $mail; ?>" >
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="balls" class="col-xs-4 control-label">Ваши баллы</label>
                        <div class="col-xs-7">
                            <input type="text" name="regballs" class="form-control" id="chballs" placeholder="<?php echo $balls; ?>" >
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="berd_year" class="col-xs-4 control-label">Ваш год рождения</label>
                        <div class="col-xs-7">
                            <input type="text" name="regberd_year" class="form-control" id="chberd_year" placeholder="<?php echo $berd_year; ?>" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="place" class="col-xs-4 control-label">Ваш город</label>
                        <div class="col-xs-7">
                            <input type="text" name="regplace" class="form-control" id="chplace" placeholder="<?php echo $place; ?>" >
                        </div>
                    </div>
                    
                    
                    <!-- Футер модального окна -->
                    <div class="modal-footer">
                        <button id="chsendreg"  class="btn btn-primary">Отправить</button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
</div>

<!-- HTML-код модального окна -->
<div id="SenksChange" class="modal"  role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Основное содержимое модального окна -->
            <div class="modal-body">
                <div class="text-center" >
                    <h5>Спасибо, данные сохранены.</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Конец модального окна регистрации -->


