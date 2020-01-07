<?php

class Connection {

    static function getConnection() {
        try {
            $options = [
                PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
            ];
            $connection = new PDO("mysql:host=localhost;dbname=mxzmampf_mnpst;", "mxzmampf_mpt", "L_wFFbZu@Q%o", $options);
            return $connection;
        }catch(PDOException $e) {
            echo 'Error durante la conexion: ' . $e->getMessage();
            die();
        }
    }

}