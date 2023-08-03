<?php

namespace app;

class DBConnection
{
    private $db;
    private $user;
    private $password;
    public function __construct($params)
    {
        $arr = json_decode($params);
        $this->db = $arr["db"];
        $this->user = $arr["user"];
        $this->password = $arr["password"];
    }

    /**
     * @return mixed
     */
    public function DBConnect()
    {
        return //экземпляр класса
    }
}