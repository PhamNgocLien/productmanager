<?php

namespace Product\Model;

use PDO;

class DBConnect
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=productmanager;charset=utf8";
        $this->username = "root";
        $this->password = "Gahambi@8791";
    }

    public function connectDB()
    {
        $connect = new PDO($this->dsn, $this->username, $this->password);
        return $connect;
    }
}