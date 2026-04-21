<?php

require '../helpers.php';

$routes = [
    '/' => 'controller/home.php',
    '/listing' => 'controller/listings/index.php',
    '/listings/create' => 'controller/listings/create.php',
    '404' => 'controller/error/404.php'
];

// Get the requested URI without the query string
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// For XAMPP subdirectory compatibility (e.g., localhost/WS03/public/)
$basePath = dirname($_SERVER['SCRIPT_NAME']);
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

// Default to '/' if empty
if ($uri === '' || $uri === '/index.php') {
    $uri = '/';
}

if (array_key_exists($uri, $routes)) {
    require basePath($routes[$uri]);
} else {
    require basePath($routes['404']);
}
