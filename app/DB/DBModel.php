<?php

namespace App\DB;

use PDO;
use PDOException;


class DBModel
{
    protected $dbHandler;
    public $tmp;
    public function __construct($db_config) //2DO: Переделать на класс
    {
        if ($cfg = json_decode(file_get_contents($db_config), true)){
            $dsn = 'mysql:dbname='.$cfg["db"].';host='.$cfg["host"];
        };
        $this->tmp = $dsn;

        try {
            $this->dbHandler = new PDO($dsn, $cfg["user"], $cfg["password"],[
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        }
        catch (PDOException $e) {
            die("Failed to connect to database: " . $e->getMessage());
        }
    }
    function __destruct() {
        unset($this->dbHandler);
    }
    public function runQuery($query){
        //Готовим и запускаем запрос
        $res = $this->dbHandler->prepare(
            $query,
            [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        try
        {
            $res->execute();
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            die("Ошибка выполнения запроса: " . $e->getMessage());
        }
    }
}