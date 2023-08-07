<?php

namespace App\DB;
use PDO;
use PDOException;
class WorkDBQuery extends DBModel
{
    private static $instance = null;
    public function __construct($db_config)
    {
        if (self::$instance === null) {
            self::$instance = parent::__construct($db_config);
        }
    }

}