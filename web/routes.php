<?php

use Core\Router;
use App\Controllers\ApiController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;

$router = new Router();

//defince cest
$router->get("/Projekty/TodoApp/", DashboardController::class, 'index',['auth'] );
$router->get("/Projekty/TodoApp/done", DashboardController::class, 'done');
$router->get("/Projekty/TodoApp/delete", DashboardController::class, 'deleteTodo');
$router->post("/Projekty/TodoApp/", DashboardController::class, 'createNewTodo');
$router->get("/Projekty/TodoApp/update", DashboardController::class, 'markTodoAsDone');

$router->get("/Projekty/TodoApp/api", ApiController::class, "index");

$router->get("/Projekty/TodoApp/login", LoginController::class, 'showLogin');
$router->post("/Projekty/TodoApp/login", LoginController::class, 'loginUser');


$router->get("/Projekty/TodoApp/register", LoginController::class, 'ShowRegisterForm');
$router->post("/Projekty/TodoApp/register", LoginController::class, 'registerUser');
$router->get("/Projekty/TodoApp/logout", LoginController::class, 'logout');


//zjištění na jaké adrese 
$currentUrl = $_SERVER['REQUEST_METHOD'] . $_SERVER['REQUEST_URI'];
$currentUrl = parse_url($currentUrl)['path'];


//spusť metodu pro tuto URL na konkrétním kontroleru
$router->dispatch($currentUrl);
