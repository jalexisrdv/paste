<?php

require_once 'models/sql-pastes.php';

$sqlPastes = new SQLPastes();

if(isset($_POST) && !empty($_POST)) {
    $sqlPastes->insertPaste($_POST);
    $idPaste = $sqlPastes->getUltimoPaste()['pasteID']; 
    header("Location: ./?v=$idPaste");
}

require_once 'views/vnew.php';