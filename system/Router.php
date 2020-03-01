<?php

class Router
{
    private $routes;
    private $config;

    public function __construct()
    {
        $this->routes = require_once(__DIR__ . '/../system/config/routes.php');
        $this->config = require_once(__DIR__ . '/../system/config/config.php');
    }

    private function getUri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function run()
    {
        $uri = $this->getUri();
    }
}