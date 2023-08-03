<?php

namespace App;
use PDO;
use PDOException;

/*2DO
Сделать абстрактный класс для подключения к разным БД с разными конфигами
*/

class DBModel
{
    private static $connection = null;
    private $host;
    private $db;
    private $user;
    private $password;

    public function __construct($db_config)
    {
        $arr = json_decode(file_get_content($db_config));
        $this->host = $arr["db"];
        $this->db = $arr["db"];
        $this->user = $arr["user"];
        $this->password = $arr["password"];

        try {
            $this->dbh = new PDO($dsn, $config->get('db_user'), $config->get('db_pass'), [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        }
        catch (PDOException $e) {
            die("Failed to connect to database: " . $e->getMessage());
        }

        if (!self::$connection)
            self::$connection = new PDO('mysql:dbname=framework;host=localhost', 'framework', 'passwrd123');
        return self;//экземпляр класса
    }

    /**
     * @return mixed
     */
    public static function getDBConnection()
    {
        if (!self::$connection) self::$connection = new PDO('mysql:dbname=framework;host=localhost', 'framework', 'passwrd123');
        return self//экземпляр класса
    }
}