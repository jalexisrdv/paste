<?php

require_once 'models/sql-pastes.php';

$sqlPastes = new SQLPastes();

if(isset($_POST) && !empty($_POST)) {
    $sqlPastes->insertPost($_POST);
    header("Location: ./pastes.php");
}

require_once 'views/vnew.php';