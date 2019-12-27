<?php

class Connection {

    private $connection;

    static function getConnection() {
        try {
            $options = [
                PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
            ];
            $connection = new PDO("mysql:host=localhost;dbname=multi_paste;", "root", "root", $options);
            return $connection;
        }catch(PDOException $e) {
            echo 'Error durante la conexion: ' . $e->getMessage();
        }
    }

}