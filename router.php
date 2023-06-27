<?php


function callFunClass($class, $func, $params = [])
{

    $instance = new $class;
    call_user_func_array([$instance, $func], $params);
}

function routeExist($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {

        [$class, $func] = $routes[$uri];

        callFunClass($class, $func);
    } else {

        abort();
    }
}
function routeToController($method, $uri, $routes)
{


    routeExist($uri, $routes[$method]);
}


$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_SERVER['REQUEST_METHOD'];
if (isset($_POST['_method']) && $_POST['_method'] === 'delete') {

    $method = 'DELETE';
}
require './routes.php';

routeToController($method, $uri, $routes);
