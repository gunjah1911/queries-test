<?php

namespace App\DB;
use PDO;
use PDOException;
class UsersQueries extends DBModel
{
    private static $instance = null;
    public function __construct($db_config)
    {
        if (self::$instance === null) {
            self::$instance = parent::__construct($db_config);
        }
        //parent::__construct($db_config);
    }
    public function getUserQueries($userID) {
        $res = $this->dbHandler->prepare(
        'SELECT queries.id, user_id, query_name, query
               FROM queries
               JOIN users ON queries.user_id=users.id
               WHERE users.id = :userID'/*,
               [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]*/);
        $res->execute(['userID' => $userID]);
        //return $res->fetchAll(PDO::FETCH_ASSOC);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUsers() {
        $res = $this->dbHandler->prepare(
            'SELECT *
               FROM users',
            [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getQueryById($queryID) {
        $res = $this->dbHandler->prepare(
            'SELECT *
               FROM queries
               WHERE id = :queryID',
            [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $res->execute(['queryID' => $queryID]);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteQueryById($queryID){
        $res = $this->dbHandler->prepare(
            'DELETE FROM queries 
            WHERE id = :queryID',
            [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        return $res->execute(['queryID' => $queryID]);
    }

    public function addNewQuery($user_id, $query_name, $query){
        $res = $this->dbHandler->prepare(
            'INSERT INTO queries
            VALUES (null, :user_id, :query_name, :query)',
            [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        return $res->execute(['user_id' => $user_id, 'query_name' => $query_name, 'query' => $query]);
    }

}