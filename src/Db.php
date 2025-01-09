<?php

namespace App;

class Db
{
    public \PDO $conn;

    public function __construct()
    {
        $dsn = "mysql:host=mysql;port=3306;user=root;password=root;dbname=gym;charset=utf8mb4";

        $this->conn = new \PDO($dsn, 'root', 'root', [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params)
    {
        $stmt = $this->conn->prepare($query);

        $stmt->execute($params);

        return $stmt;
    }
}