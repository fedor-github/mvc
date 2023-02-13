<?php

require_once __DIR__ . '/../vendor/autoload.php';

$routes = require __DIR__ . '/../app/routes.php';

$dispatcher = FastRoute\simpleDispatcher($routes);

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
$pos = strpos($uri, '?');
if (false !== $pos) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        header('HTTP/1.0 404 Not Found');
        break;
    case FastRoute\Dispatcher::FOUND:
        require_once __DIR__ . '/../app/bootstrap.php';
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler);
        break;
}
