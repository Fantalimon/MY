<?php
include_once 'autoload.php';

if (!empty($_POST)) {
    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : '';
    $territory = isset($_POST['territory']) ? strip_tags(trim($_POST['territory'])) : '';
    
    $result = false;
    
    if (empty($name && $email && $territory)) {
        $error = 'Заполните поля';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
       $error = 'Некорректно введен Адресс';
    }
    else {
        $userData = [
            'name' => $name,
            'email' => $email,
            'territory' => $territory
        
        ];
        
        $user = new User($userData);
        $result = $user->save();
        
        
    }
    
}
