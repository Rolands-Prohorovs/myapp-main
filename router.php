<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/training_history' => 'controllers/training_history.php',

    '/add_new_training' => 'controllers/add_new_training.php',
    '/log_out' => 'controllers/auth/log_out.php',
    '/login' => 'controllers/auth/login.php',
    '/register' => 'controllers/auth/register.php',
    '/training_plans' => 'controllers/training_plans.php',
    '/goals' => 'controllers/goals.php',
    '/dashboard' => 'controllers/index.php',
];

function routerToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];

    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require "views/{$code}.php";
}

routerToController($uri, $routes);