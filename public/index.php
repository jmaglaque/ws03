<?php

require '../helpers.php';
require basePath('Database.php');
$config = require basePath('config/db.php');

$db = new Database($config);
require basePath('Router.php');

$router = new Router();

$routes = require basePath('routes.php');
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];


$routes = 

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Strip trailing slashes, but keep /
if ($uri !== '/' && strlen($uri) > 1) {
    $uri = rtrim($uri, '/');
}

if (array_key_exists($uri, $routes)) {
    require(basePath($routes[$uri]));
} else {
    http_response_code(404);
    require basePath($routes['404']);
}
