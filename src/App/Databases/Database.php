<?php

namespace App\Databases;

class Database
{
    private $options = [
		\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
		\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
		\PDO::ATTR_EMULATE_PREPARES   => false,
	];
    private $host = 'localhost';
    private $db   = 'cinema';
    private $user = 'root';
    private $pass = '123456';
    private $charset = 'utf8';
    private $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;name=$this->db;charset=$this->charset";
        $this->pdo = new \PDO($dsn, $this->user, $this->pass, $this->options);
    }

    public function select($selector, $table, $where = '')
    {
        $stmt = $this->pdo->query("SELECT $selector FROM $this->db.$table $where");
        $list = $stmt->fetchAll();
        return $list;
    }
}
