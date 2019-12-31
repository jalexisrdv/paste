<?php

require_once 'models/sql-pastes.php';
require_once 'models/m-pagination.php';

$sqlPastes = new SQLPastes();
$pagination = new Pagination(8, 4);

if(!isset($_GET['v'])) {
    
    require_once 'models/functions.php';

    $currentPage = $pagination->getCurrentPage($_GET);
    $start = $pagination->getStartLimit($currentPage);
    $pastesByPage = $pagination->getPastesByPage();
    $search = (!empty($_GET['buscar'])) ? $_GET['buscar'] : '';
    $pastes = $sqlPastes->getLimitPastes($search, $start, $pastesByPage);

    if(!$pastes) {
        header('Location: .');
    }

    $totalPages = $pagination->getTotalPages($sqlPastes->getTotalPaste());

/*if (!is_numeric($_GET['v'])){
    $aux = bstrtob10($_GET['v']);
    @header("Location:.?v=".$aux);
    exit('<meta http-equiv="Refresh" content="0;url=.?v='.$aux.'">');
}*/

    require_once 'views/vindex.php';

}else {
    //Se carga la vista para mostrar el contenido del paste
    require_once 'paste.php';
}