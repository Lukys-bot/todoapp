<?php

namespace Core;


class Router
{
    public $routes = [];

    // Přidává novou trasu do routovacího systému pro GET metodu
    public function get($url, $controller, $callback, $middleware = [])
    {
        $this->addRoute($url, $controller, $callback, "GET");
    }

    // Přidává novou trasu do routovacího systému pro POST metodu
    public function post($url, $controller, $callback)
    {
        $this->addRoute($url, $controller, $callback, "POST");
    }

    // Přidává novou trasu do routovacího systému pro libovolné metody
    public function addRoute($url, $controller, $callback, $http_method)
    {
        $this->routes[$http_method . $url] = [
            'controller' => $controller,
            'callback' => $callback,
            'http_method' => $http_method,
        ];
    }

    // Zpracovává aktuální URL a volá příslušný kontroler a metodu
    public function dispatch($url)
    {
        if (array_key_exists($url, $this->routes)) {
            $controller = $this->routes[$url]['controller'];
            $callback = $this->routes[$url]['callback'];

            $controllerInit = new $controller();


            


            $controllerInit->$callback($_POST ? $_POST : []);
        }
    }
}
