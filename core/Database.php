<?php

namespace Core;

use PDO;

class Database
{
    public $pdo;

    public function __construct()
    {
        require "config.php";

        $host = DB_HOST;
        $db   = DB_DATABASE;
        $user = DB_USERNAME;
        $pass = DB_PASSWORD;
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
    }


    public function query(string $query, array $values = null)
    {

        if ($values) {
            $values = array_values($values);
            $stmp = $this->pdo->prepare($query);
            $stmp->execute($values);
        } else {
            $stmp = $this->pdo->query($query)->fetchAll();
        }

        return $stmp;
    }
}
