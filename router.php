<?php
require './routes.php';

function callFunClass($class, $func, $params = []){

    $instance = new $class;
    call_user_func_array([$instance, $func], $params);
 
 
 }
function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
      
        [$method,$class,$func ]= $routes[$uri];
         
         callFunClass($class,$func);
         
    } else {

        abort();
    }
}


$uri = parse_url($_SERVER["REQUEST_URI"])["path"];


routeToController($uri, $routes);
