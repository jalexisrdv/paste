<?php

require_once 'models/sql-pastes.php';
require_once 'models/m-pagination.php';

$sqlPastes = new SQLPastes();
$pagination = new Pagination(8, 4);

$currentPage = $pagination->getCurrentPage($_GET);
$start = $pagination->getStartLimit($currentPage);
$pastesByPage = $pagination->getPastesByPage();
$search = (!empty($_GET['buscar'])) ? $_GET['buscar'] : '';
$pastes = $sqlPastes->getLimitPastes($search, $start, $pastesByPage);

if(!$pastes) {
    header('Location: ./pastes.php');
}

$totalPages = $pagination->getTotalPages($sqlPastes->getTotalPaste());

if(!empty($_GET['u'])) {//actualizacion de paste
    $paste = $sqlPastes->getPasteByID($_GET['u']);
    if(!empty($_POST)) {//datos del paste capturados
        $idPaste = $_GET['u'];
        $sqlPastes->updatePaste($_POST, $idPaste);
        header("Location: ./?v=$idPaste");
    }
    require_once 'views/vnew.php';
}else if(!empty($_GET['d'])) {//eliminar paste
    $sqlPastes->deletePaste($_GET['d']);
    header("Location: ./pastes.php");
}else {
    require_once 'views/vpastes.php';
}