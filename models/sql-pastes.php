<?php

class SQLPastes {

    private $connection;

    public function __construct() {
        require_once 'connection.php';
        $this->connection = Connection::getConnection();
    }

    public function insertPaste($dates) {
        $sql = 'INSERT INTO paste (pass, Titulo, Mirror1, Mirror2, Mirror3, Mirror4, Mirror5, Mirror6, Mname1, Mname2, Mname3, Mname4, Mname5, Mname6, Mesrep, views, user_id, vip, reported) VALUES (:pass, :titulo, :mirror1, :mirror2, :mirror3, :mirror4, :mirror5, :mirror6, :mname1, :mname2, :mname3, :mname4, :mname5, :mname6, :mesrep, :views, :user_id, :vip, :reported)';
        $statement = $this->connection->prepare($sql);
        $statement->execute(Array(
            ':pass' => '',
            ':titulo' => $dates['title'],
            ':mirror1' => $dates['content-tab-1'],
            ':mirror2' => $dates['content-tab-2'],
            ':mirror3' => $dates['content-tab-3'],
            ':mirror4' => $dates['content-tab-4'],
            ':mirror5' => $dates['content-tab-5'],
            ':mirror6' => $dates['content-tab-6'],
            ':mname1' => $dates['title-tab-1'],
            ':mname2' => $dates['title-tab-2'],
            ':mname3' => $dates['title-tab-3'],
            ':mname4' => $dates['title-tab-4'],
            ':mname5' => $dates['title-tab-5'],
            ':mname6' => $dates['title-tab-6'],
            ':mesrep' => null,
            ':views' => 0,
            ':user_id' => 0,
            ':vip' => 0,
            ':reported' => null
        ));
    }

    public function updatePaste($dates, $id) {
        $sql = 'UPDATE paste SET pass = :pass, Titulo = :titulo, Mirror1 = :mirror1, Mirror2 = :mirror2, Mirror3 = :mirror3, Mirror4 = :mirror4, Mirror5 = :mirror5, Mirror6 = :mirror6, Mname1 = :mname1, Mname2 = :mname2, Mname3 = :mname3, Mname4 = :mname4, Mname5 = :mname5, Mname6 = :mname6, Mesrep = :mesrep, views = :views, user_id = :user_id, vip = :vip, reported = :reported WHERE pasteID = :id';
        $statement = $this->connection->prepare($sql);
        $statement->execute(Array(
            ':pass' => '',
            ':titulo' => $dates['title'],
            ':mirror1' => $dates['content-tab-1'],
            ':mirror2' => $dates['content-tab-2'],
            ':mirror3' => $dates['content-tab-3'],
            ':mirror4' => $dates['content-tab-4'],
            ':mirror5' => $dates['content-tab-5'],
            ':mirror6' => $dates['content-tab-6'],
            ':mname1' => $dates['title-tab-1'],
            ':mname2' => $dates['title-tab-2'],
            ':mname3' => $dates['title-tab-3'],
            ':mname4' => $dates['title-tab-4'],
            ':mname5' => $dates['title-tab-5'],
            ':mname6' => $dates['title-tab-6'],
            ':mesrep' => null,
            ':views' => 0,
            ':user_id' => 0,
            ':vip' => 0,
            ':reported' => null,
            ':id' => $id
        ));
    }

    public function deletePaste($id) {
        $statement = $this->connection->prepare("DELETE FROM paste WHERE pasteID = :id");
        $statement->execute(Array(
            ':id' => $id
        ));
    }

    public function getPasteByID($id) {
        $statement = $this->connection->prepare("SELECT * FROM paste WHERE pasteID = :id");
        $statement->execute(Array(
            ':id' => $id
        ));
        $result = $statement->fetch();
        return $result;
    }

    public function getUltimoPaste() {
        $statement = $this->connection->prepare("SELECT pasteID FROM paste ORDER BY pasteID DESC LIMIT 1");
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }

    public function getLimitPastes($search, $start, $end) {
        $statement = $this->connection->prepare('SELECT SQL_CALC_FOUND_ROWS  pasteID, titulo FROM paste WHERE titulo LIKE :search LIMIT :start, :end');
        $statement->execute(array(
            ':search' => "%$search%",
            ':start' => $start,
            ':end' => $end
        ));
        $results = $statement->fetchAll();
        return $results;
    }

    public function getTotalPaste() {
        $statement = $this->connection->prepare('SELECT FOUND_ROWS() AS total');
        $statement->execute();
        return (int) ($statement->fetch()['total']);
    }

}