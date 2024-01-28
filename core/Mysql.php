<?php

namespace Core;

use mysqli;

class Mysql
{
    protected $connection;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "todoapp";

        $this->connection = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function dotaz(String $query, $values = null): array
    {
        $result = $this->connection->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
