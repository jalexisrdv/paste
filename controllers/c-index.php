<?php

require_once 'models/sql-pastes.php';

$sqlPastes = new SQLPastes();

if(!isset($_GET['v'])) {
    
    require_once 'models/functions.php';

$page = (isset($_GET['pagination'])) ? (int) $_GET['pagination'] : 1;
$currentPage = $page;
$pastesByPage = 8;
$numberPages = 4;
$start = ($page > 1) ? $page * $pastesByPage - $pastesByPage : 0;
$search = $_GET['buscar'];
$pastes = $sqlPastes->getLimitPastes($search, $start, $pastesByPage);
if(!$pastes) {
    header('Location: .');
}
$totalPastes = $sqlPastes->getTotalPost();
$totalPages = ceil($totalPastes / $pastesByPage);

if($page <= $totalPages) {
    $numberPages = $page + 4;
    if($numberPages >= $totalPages) {
        $page = $totalPages - 4;
        $numberPages = $page + 4;
    }
}else {
    $numberPages = 0;
}

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