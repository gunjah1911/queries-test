<?php

namespace App\DB;

use PDO;
use PDOException;

/*2DO
Сделать абстрактный класс для подключения к разным БД с разными конфигами
*/

class DBModel
{
    public $tmp;
    public function __construct($db_config) //2DO: Переделать на класс
    {
        if ($cfg = json_decode(file_get_contents($db_config), true)){
            $dsn = 'mysql:dbname='.$cfg["db"].';host='.$cfg["host"];
        };
        $this->tmp = $dsn;

        try {
            return new PDO($dsn, $cfg["user"], $cfg["password"],[
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        }
        catch (PDOException $e) {
            die("Failed to connect to database: " . $e->getMessage());
        }

    }
    public function runQuery()
    {
        //Готовим и запускаем запрос
    }
}