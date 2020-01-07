<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!empty($_SESSION)) {
    require_once 'views/vpagination.php';
}else {
    header('Location: .');
}