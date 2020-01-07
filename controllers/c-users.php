<?php

session_start();

require_once 'models/sql-users.php';
require_once 'models/m-pagination.php';

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