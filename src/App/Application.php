<?php

namespace App;

class Application
{
    private $router = [];

    public function get($path, $handler)
    {
        $this->append('GET', $path, $handler);
    }

    public function post($path, $handler)
    {
        $this->append('POST', $path, $handler);
    }

    public function put($path, $handler)
    {
        $this->append('PUT', $path, $handler);
    }
    
    public function run()
    {
        $requestPath = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        foreach ($this->router as $response) {
            list($handlerMethod, $handlerPath, $handler) = $response;
            $isRequestToDB = ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('_method', $_POST));
            $requestMethod = $isRequestToDB ? $_POST['_method'] : $requestMethod;
            if ($handlerMethod === $requestMethod && $handlerPath === $requestPath) {
                echo $handler();
                return;
            }
        }
    }

    public function append($method, $path, $handler)
    {
        $this->router[] = [$method, $path, $handler];
    }

    
}