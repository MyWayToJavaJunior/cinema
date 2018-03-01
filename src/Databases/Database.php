<?php

namespace Databases;

class Database
{
    private $options = [
		\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
		\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
		\PDO::ATTR_EMULATE_PREPARES   => false,
	];
    private $host = 'localhost';
    private $db   = 'db_name';
    private $user = 'user_name';
    private $pass = 'password';
    private $charset = 'utf8';
    private $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $this->pdo = new \PDO($dsn, $this->user, $this->pass, $this->options);
        return $this->pdo;
    }
}

