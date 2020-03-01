<?php

require_once(__DIR__ . '/app/autoload.php');
require_once(__DIR__ . '/system/Router.php');

$router = new Router();
$router->run();