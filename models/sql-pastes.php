<?php

class SQLPastes {

    private $connection;

    public function __construct() {
        require_once 'connection.php';
        $this->connection = Connection::getConnection();
    }

    public function getAllPosts() {
        $statement = $this->connection->prepare('SELECT * FROM paste');
        $statement->execute();
        $resultados = $statement->fetchAll();
        return $resultados;
    }

    public function getLimitPosts($start, $end) {
        $statement = $this->connection->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM paste LIMIT :start, :end');
        $statement->execute(array(
            ':start' => $start,
            ':end' => $end
        ));
        $resultados = $statement->fetchAll();
        return $resultados;
    }

    public function getTotalPost() {
        $statement = $this->connection->prepare('SELECT FOUND_ROWS() AS total');
        $statement->execute();
        return (int) ($statement->fetch()['total']);
    }

}