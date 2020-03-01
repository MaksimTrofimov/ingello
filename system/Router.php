<?php

class Router
{
    const URI_DEFAULT = 'default';

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
        $path = $this->searchRoute();

        $controllerName = 'App\Controllers\\' . ucfirst(array_shift($path)) . 'Controller';
        $methodName = array_shift($path);

        $obj = new $controllerName();
        $obj->$methodName();
    }

    private function searchRoute()
    {
        $uri = $this->getUri();

        if (!$uri) {
            $uri = self::URI_DEFAULT;
        }

        foreach ($this->routes as $key => $route) {
            if ($key == $uri) {
                $path = $route;
            }
        }

        if (!isset($path)) {
            $this->response404();
        }
        $path = explode('/', $path);
        return $path;
    }


    private function response404()
    {
        http_response_code(404);
        die('404');
    }
}