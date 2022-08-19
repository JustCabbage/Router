<?php
declare(strict_types=1);
namespace Core;

class Router
{
    private array $routes = [];

    public function get(string $path, callable|array $callback) : void
    {
        $this->insert("GET", $path, $callback);
    }

    public function post(string $path, callable|array $callback) : void
    {
        $this->insert("POST", $path, $callback);
    }

    public function execute() : void
    {
        $method = $_SERVER["REQUEST_METHOD"];

        if(array_key_exists($method, $this->routes))
        {
            $path = explode("?", $_SERVER["REQUEST_URI"])[0];
            $callback = $this->routes[$method][$path] ?? null;

            if($callback == null || !is_callable($callback))
            {
                header("HTTP/1.0 404 Not Found");
            }
            else
            {
                call_user_func($callback, array_merge($_GET, $_POST));
            }
        }
    }

    private function insert(string $method, string $path, callable|array $callback) : void
    {
        $this->routes[$method][$path] = $callback;
    }
}