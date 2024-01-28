<?php

namespace App\Controllers;

use App\Models\Todo;
use Core\Dump;

class ApiController
{
    public function index()
    {
        $todoModel = new Todo();

        if (isset($_GET['todo_id'])) {
            $response = $todoModel->find($_GET['todo_id']);
            echo json_encode($response);
        } else {
            $response = $todoModel->all();
            echo json_encode($response);
        }
    }
}
