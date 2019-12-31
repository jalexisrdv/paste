<?php

require_once 'models/sql-pastes.php';

$sqlPastes = new SQLPastes();
$pastes = $sqlPastes->getAllPastes();

if(!empty($_GET['u'])) {
    $paste = $sqlPastes->getPostByID($_GET['u']);
    if(!empty($_POST)) {
        $idPaste = $_GET['u'];
        $sqlPastes->updatePaste($_POST, $idPaste);
        header("Location: ./?v=$idPaste");
    }
    require_once 'views/vnew.php';
}else if(!empty($_GET['d'])) {
    $sqlPastes->deletePaste($_GET['d']);
    header("Location: ./pastes.php");
}else {
    require_once 'views/vpastes.php';
}