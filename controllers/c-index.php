<?php

session_start();

require_once 'models/sql-pastes.php';
require_once 'models/m-pagination.php';
require_once 'models/functions.php';

$sqlPastes = new SQLPastes();
$pagination = new Pagination(8);

if(!empty($_GET['v'])) {

    //Se carga la vista para mostrar el contenido del paste
    require_once 'paste.php';

}else {

    $pagina = (!empty($_GET['pagina'])) ? clearDate($_GET['pagina']) : '';
    $currentPage = $pagination->getCurrentPage($pagina);
    $start = $pagination->getStartLimit($currentPage);
    $pastesByPage = $pagination->getElementsByPage();
    $search = (!empty($_GET['buscar'])) ? clearDate($_GET['buscar']) : '';
    $pastes = $sqlPastes->getLimitPastes($search, $start, $pastesByPage);

    if(!$pastes) {
        header('Location: /');
    }

    $totalPages = $pagination->getTotalPages($sqlPastes->getTotalPaste());

    require_once 'views/vindex.php';
}