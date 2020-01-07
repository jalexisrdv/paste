<?php

session_start();

require 'models/functions.php';
require 'models/sql-users.php';

$msjSuccess = '';
$msjError = '';

if(!empty($_SESSION) && $_SESSION['typeUser']=='administrador') {
    $configurations = parse_ini_file('models/admin-configuration.ini', true, INI_SCANNER_TYPED);

    if(!empty($_POST)) {

        $configurations['site-dates']['name-site'] = clearDate($_POST['name-site']);
        $configurations['site-dates']['description-site'] = clearDate($_POST['description-site']);

        $configurations['advertising']['up-advertising'] = clearDate($_POST['up-advertising']);
        $configurations['advertising']['down-advertising'] = clearDate($_POST['down-advertising']);
        $configurations['advertising']['home-advertising'] = clearDate($_POST['home-advertising']);

        $configurations['modules']['users-register'] = clearDate($_POST['users-register']);
        $configurations['modules']['users-vip'] = clearDate($_POST['users-vip']);
        $configurations['modules']['urls-mode'] = clearDate($_POST['urls-mode']);
        $configurations['modules']['captcha-paste'] = clearDate($_POST['captcha-paste']);

        escribe_ini($configurations, 'models/admin-configuration.ini', true, 'w');

        if(!empty($_POST['email'])) {
            $sqlUsers = new SQLUsers();
            $email = clearDate($_POST['email']);
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sqlUsers->updateEmail($_SESSION['user'], $email);
                $_SESSION['email'] = $email;
                $msjSuccess = 'Correo actualizado correctamente' . "<br />";
            }else {
                $msjError = 'Correo no valido';
            }
    
        }

        if(!empty($_POST['password'])) {
            $sqlUsers = new SQLUsers();
            $newPassword = clearDate($_POST['password']);
            $sqlUsers->updatePassword($_SESSION['user'], $newPassword);
            $msjSuccess .= 'Contraseña actualizada correctamente' . "<br />";
        }

        $msjSuccess .= 'Configuración actualizada correctamente';

        unset($_POST);
    }

    require_once 'views/vadmin-configurations.php';
}else if(!empty($_SESSION) && $_SESSION['typeUser']=='autor') {

    if(!empty($_POST['email'])) {
        $sqlUsers = new SQLUsers();
        $email = clearDate($_POST['email']);
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sqlUsers->updateEmail($_SESSION['user'], $email);
            $_SESSION['email'] = $email;
            $msjSuccess = 'Correo actualizado correctamente' . "<br />";
        }else {
            $msjError = 'Correo no valido';
        }

    }

    if(!empty($_POST['password'])) {
        $sqlUsers = new SQLUsers();
        $newPassword = clearDate($_POST['password']);
        $sqlUsers->updatePassword($_SESSION['user'], $newPassword);
        $msjSuccess .= 'Contraseña actualizada correctamente';
    }

    unset($_POST);

    require_once 'views/vuser-configurations.php';
}else {
    header('Location: /');
}