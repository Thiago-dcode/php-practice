<?php
require './routes.php';


function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {

        require $routes[$uri];
    } else {

        abort();
    }
}


routeToController($uri, $routes);
