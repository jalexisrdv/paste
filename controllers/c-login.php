<?php

require_once 'models/sql-users.php';
require_once 'models/functions.php';

$sqlUsers = new SQLUsers();
$msjError = '';

if(!empty($_POST['user-name']) && !empty($_POST['user-password'])) {
    $userName = clearDate($_POST['user-name']);
    $userPassword = clearDate($_POST['user-password']);
    $user = $sqlUsers->existsUser($userName, $userPassword);

    if(empty($user)) {
        $msjError = 'Error al ingresar tus datos';
    }else {
        session_start();
        $_SESSION['userID'] = $user['userID'];
        $_SESSION['user'] = $user['user'];
        $_SESSION['email'] = $user['mail'];
        $_SESSION['typeUser'] = $user['typeUser'];
        header('Location: /');
    }
    
}

require_once 'views/vlogin.php';