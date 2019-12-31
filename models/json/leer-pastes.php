<?php

error_reporting(0);

header('Content-type: application/json; charset=utf-8');

require_once 'connection.php';

$sqlPastes = new SQLPastes();

if($connection) {
    
}else {
    echo $respuesta = [
        'error' => true
    ];
}