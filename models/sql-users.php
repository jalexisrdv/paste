<?php

class SQLUsers {

    const HASH = PASSWORD_DEFAULT;
    const COST = 10;

    private $connection;
    
    public function __construct() {
        require_once 'connection.php';
        $this->connection = Connection::getConnection();
    }

    public function getLimitUsers($search, $start, $end) {
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM user INNER JOIN type_user ON user.fk_type_user=type_user.typeUserID WHERE user LIKE :search LIMIT :start, :end";
        $statement = $this->connection->prepare($sql);
        $statement->execute(Array(
            ':search' => "%$search%",
            ':start' => $start,
            ':end' => $end
        ));
        $result = $statement->fetchAll();
        return $result;
    }

    public function getTotalUsers() {
        $statement = $this->connection->prepare('SELECT FOUND_ROWS() AS total');
        $statement->execute();
        return (int) ($statement->fetch()['total']);
    }

    public function deleteUser($userID) {
        $statement = $this->connection->prepare("DELETE FROM user WHERE userID = :userID");
        $statement->execute(Array(
            ':userID' => $userID
        ));
    }

    public function updatePassword($user, $password) {
        $statement = $this->connection->prepare("UPDATE user SET pass = :password WHERE user = :user");
        $statement->execute(Array(
            ':password' => $this->hash($password),
            ':user' => $user
        ));
    }

    public function updateEmail($user, $email) {
        $statement = $this->connection->prepare("UPDATE user SET mail = :email WHERE user = :user");
        $statement->execute(Array(
            ':email' => $email,
            ':user' => $user
        ));
    }

    private function getUser($user) {
        $sql = "SELECT * FROM user INNER JOIN type_user ON user.fk_type_user = type_user.typeUserID WHERE user = :user";
        $statement = $this->connection->prepare($sql);
        $statement->execute(Array(
            ':user' => $user
        ));
        $result = $statement->fetch();
        return $result;
    }

    public function existsUser($user, $password) {
        $user = $this->getUser($user);
        $passCorrecta = $this->reviewPassword($user['user'], $password, $user['pass']);
        if($passCorrecta) {
            return $user;
        }else {
            return Array();
        }
    }

    private function reviewPassword($user, $password, $passwordHash) {
        if(md5($password)===$passwordHash) {
            //Ahora comprobamos si la contrase«Ða necesita rehash
           if(password_needs_rehash($passwordHash, self::HASH, ['cost' => self::COST])) {
               //Actualizando el tipo de encriptacion
                $this->updatePassword($user, $password);
            }
            return true;
        }else if($this->verify($password, $passwordHash)) {
            //el hash de la contrase«Ða es igual
            //Ahora comprobamos si la contrase«Ða necesita rehash
           if(password_needs_rehash($passwordHash, self::HASH, ['cost' => self::COST])) {
                //Actualizando el tipo de encriptacion
                $this->updatePassword($user, $password);
            }
            return true;
        }
        return false;
    }

    private function hash($password) {
        return password_hash($password, self::HASH, ['cost' => self::COST]);
    }

    private function verify($password, $hash) {
        return password_verify($password, $hash);
    }

}