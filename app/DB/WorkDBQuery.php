<?php

namespace App\DB;
use PDO;
use PDOException;
class WorkDBQuery extends DBModel
{
    const DEFAULT_CONFIG_PATH = __DIR__.'/../../conf/work_db_config.json';

    private static $instance = null;
    public function __construct($db_config = self::DEFAULT_CONFIG_PATH)
    {
        if (self::$instance === null) {
            self::$instance = parent::__construct($db_config);
        }
    }

}