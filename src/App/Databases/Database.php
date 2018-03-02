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

    public function select(string $selector, string $table, string $where = '')
    {
        $stmt = $this->pdo->query("SELECT $selector FROM $this->db.$table $where");
        $list = $stmt->fetchAll();
        return $list;
    }

    public function insert(string $table, array $fields, array $values)
    {
        function impode_arr($array) {
            return implode(', ', $array);
        }
        $fieldsPrepare = impode_arr($fields);
        $valuesPrepare = impode_arr(array_fill(0, count($fields), '?'));
        $stmt = $this->pdo->prepare("INSERT INTO $this->db.$table ($fieldsPrepare) VALUES ($valuesPrepare)");
        $result = $stmt->execute($values);

        return $result;
    }

    public function preparater($operatror, $array)
    {
        $fields = [];
        $fields += array_map(function ($key, $value) {
            return "$key=?";
        }, array_keys($array), $array);
        
        $response = "$operatror ".implode(', ', $fields);
        return $response;
    }

    public function update(string $table, array $settings, array $wheres)
    {        
        $set = $this->preparater('SET', $settings);
        $where = $this->preparater('WHERE', $wheres);

        $setFields = implode(', ', array_values($settings));
        $whereFields = implode(', ', array_values($wheres));

        $stmt = $this->pdo->prepare("UPDATE $this->db.$table $set $where");
        $result = $stmt->execute([$setFields, $whereFields]);

        return $result;
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}

