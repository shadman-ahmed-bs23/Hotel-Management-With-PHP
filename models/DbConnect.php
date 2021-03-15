<?php

class DbConnect
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "Admin@123";
    private $dbName = "custom_hotel";

    public function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new pdo($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }

}