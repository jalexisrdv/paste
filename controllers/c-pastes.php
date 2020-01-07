<?php

session_start();

if(!empty($_SESSION)) {

    require_once 'models/sql-pastes.php';
    require_once 'models/m-pagination.php';
    require_once 'models/functions.php';

    $sqlPastes = new SQLPastes();
    $pagination = new Pagination(8);

    $pagina = (!empty($_GET['pagina'])) ? clearDate($_GET['pagina']) : '';
    $currentPage = $pagination->getCurrentPage($pagina);
    $start = $pagination->getStartLimit($currentPage);
    $pastesByPage = $pagination->getElementsByPage();
    $search = (!empty($_GET['buscar'])) ? clearDate($_GET['buscar']) : '';

    //Si es admin puede ver todos los pastes creados
    //Si es autor solo puede ver los pastes que el ha creado
    if($_SESSION['typeUser']=='administrador') {
        $pastes = $sqlPastes->getLimitPastes($search, $start, $pastesByPage);
    }else if($_SESSION['typeUser']=='autor') {
        $pastes = $sqlPastes->getLimitPastesByAutor($search, $start, $pastesByPage, $_SESSION['userID']);
    }

    $totalPages = $pagination->getTotalPages($sqlPastes->getTotalPaste());

    require_once 'views/vpastes.php';

}else {
    header('Location: .');
}