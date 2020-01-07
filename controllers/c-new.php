<?php

session_start();

require_once 'models/sql-pastes.php';
require_once 'models/functions.php';

$sqlPastes = new SQLPastes();

if(!empty($_POST)) {
    $dates = Array(
        'title' => clearDate($_POST['title']),
        'content-tab-1' => clearDate($_POST['content-tab-1']),
        'content-tab-2' => clearDate($_POST['content-tab-2']),
        'content-tab-3' => clearDate($_POST['content-tab-3']),
        'content-tab-4' => clearDate($_POST['content-tab-4']),
        'content-tab-5' => clearDate($_POST['content-tab-5']),
        'content-tab-6' => clearDate($_POST['content-tab-6']),
        'title-tab-1' => clearDate($_POST['title-tab-1']),
        'title-tab-2' => clearDate($_POST['title-tab-2']),
        'title-tab-3' => clearDate($_POST['title-tab-3']),
        'title-tab-4' => clearDate($_POST['title-tab-4']),
        'title-tab-5' => clearDate($_POST['title-tab-5']),
        'title-tab-6' => clearDate($_POST['title-tab-6'])
    );
    $sqlPastes->insertPaste($dates, $_SESSION['userID']);
    $idPaste = $sqlPastes->getUltimoPaste()['pasteID']; 
    header("Location: ./?v=$idPaste");
}

require_once 'views/vnew.php';