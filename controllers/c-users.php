<?php

session_start();

if(!empty($_SESSION)) {

    require_once 'models/sql-users.php';
    require_once 'models/m-pagination.php';
    require_once 'models/functions.php';

    $sqlUsers = new SQLUsers();
    $pagination = new Pagination(8);

    $pagina = (!empty($_GET['pagina'])) ? clearDate($_GET['pagina']) : '';
    $currentPage = $pagination->getCurrentPage($pagina);
    $start = $pagination->getStartLimit($currentPage);
    $pastesByPage = $pagination->getElementsByPage();
    $search = (!empty($_GET['buscar'])) ? clearDate($_GET['buscar']) : '';
    $users = $sqlUsers->getLimitUsers($search, $start, $pastesByPage);

    $totalPages = $pagination->getTotalPages($sqlUsers->getTotalUsers());

    require_once 'views/vusers.php';

    //Eliminar usuarios
    if($_SESSION['typeUser']=='administrador') {
        if(!empty($_GET['d'])) {
            $sqlUsers->deleteUser(clearDate($_GET['d']));
            header('Location: ./usuarios.php');
        }
    }

}else {
    header('Location: .');
}