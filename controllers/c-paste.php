<?php

$sqlPastes = new SQLPastes();
$paste = $sqlPastes->getPasteByID($_GET['v']);

if(!$paste) {
    header('Location: .');
}

require_once 'views/vpaste.php';