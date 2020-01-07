<?php

if(!isset($_SESSION)) {
    session_start();
}

require_once 'models/sql-pastes.php';
require_once 'models/functions.php';

$sqlPastes = new SQLPastes();

if(!empty($_GET['v'])) {
    if(!is_numeric($_GET['v'])) {
        $aux = bstrtob10(clearDate($_GET['v']));
        $idPaste = $aux;
        @header("Location:.?v=".$idPaste);
    }else {
        $idPaste = clearDate($_GET['v']);
    }
    $paste = $sqlPastes->getPasteByID($idPaste);
    if(!$paste) {
        header('Location: .');
    }
    require_once 'views/vpaste.php';
}else if(!empty($_GET['u'])) {//actualizacion de paste
    $paste = $sqlPastes->getPasteByID(clearDate($_GET['u']));

    if($_SESSION['userID']!=$paste['user_id'] && $_SESSION['typeUser']!='administrador') {
        header("Location: ./pastes.php");
    }

    if(!empty($_POST)) {//datos del paste capturados

        $dates = Array(
            'title' => clearDate($_POST['title']),
            'content-tab-1' => clearDate($_POST['content-tab-1']),
            'content-tab-2' => clearDate($_POST['content-tab-2']),
            'content-tab-3' => clearDate($_POST['content-tab-3']),
            'content-tab-4' => clearDate($_POST['content-tab-4']),
            'content-tab-5' => clearDate($_POST['content-tab-5']),
            'content-tab-6' => clearDate($_POST['content-tab-6']),
            'title-tab-1' => clearDate($_POST['title-tab-1']),
            'title-tab-2' => clearDate($_POST['title-tab-2']),
            'title-tab-3' => clearDate($_POST['title-tab-3']),
            'title-tab-4' => clearDate($_POST['title-tab-4']),
            'title-tab-5' => clearDate($_POST['title-tab-5']),
            'title-tab-6' => clearDate($_POST['title-tab-6'])
        );

        $idPaste = clearDate($_GET['u']);

        //El admin puede actualizar todos los pastes
        if($_SESSION['typeUser']=='administrador') {
            $sqlPastes->updatePaste($dates, $idPaste);
        }

        //Si es autor y el creador del paste, entonces lo puede actualizar
        if($_SESSION['typeUser']=='autor' && $_SESSION['userID']==$paste['user_id']) {
            $sqlPastes->updatePasteOwn($dates, $idPaste, $_SESSION['userID']);
        }

        header("Location: ./?v=$idPaste");
    }
    require_once 'views/vnew.php';
}else if(!empty($_GET['d'])) {//eliminar paste
    //Solo el admin puede eliminar paste
    if($_SESSION['typeUser']!='administrador') {
        header('Location: ./pastes.php');
    }
    $sqlPastes->deletePaste(clearDate($_GET['d']));
    header('Location: ./pastes.php');
}