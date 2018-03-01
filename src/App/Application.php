<?php

namespace App;

class Application
{
    private $router = [];

    public function setRoute($path, $handler)
    {
        $this->router[] = [$path, $handler];
    }

    public function run()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        foreach ($this->router as $response) {
            list($responseUri, $handler) = $response;
            if ($responseUri === $requestUri) {
                echo $handler();
                return;
            }
        }
    }
}