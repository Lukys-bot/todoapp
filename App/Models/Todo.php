<?php

namespace App\Models;

use Core\Model;
use PDOStatement;

class Todo extends Model
{
    protected $table = 'todos';

    public function whereDone(int $bool): array
    {
        return $this->mysql->dotaz("SELECT * FROM $this->table where done = $bool and user_id = {$_SESSION['user_id']}");
    }

    public function create($values): PDOStatement
    {
        return $this->database->query("INSERT INTO $this->table (title, description, done, user_id) VALUES (?, ?, ?, ?)", $values);
    }

    public function makeTodoDone($todo_id) : array
    {
        return $this->database->query("UPDATE $this->table SET done = 1 WHERE id = $todo_id");
    }

    public function delete($todo_id)
    {
        return $this->database->query("DELETE FROM $this->table WHERE id = $todo_id");
    }
}
