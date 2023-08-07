<?php

use Core\Response;



function abort($code = 404)
{
    $path = basePath("views/errors/{$code}.view.php");
    switch ($code) {
        case 404:
            http_response_code($code);
            require $path;
            break;
        case 403:
            http_response_code($code);
            require $path;
            break;

        default:
            # code...
            break;
    }


    die();
}
function redirect($path){

    header("Location: http://localhost:8888/$path", TRUE, 301);
            exit();

}



function dd($value)
{
    
    echo '<pre>';
    var_dump($value);

    echo '<pre>';

    die;
};

function printData($str, $tag)
{

    echo "<$tag>$str</$tag>";
};

function urlIs($uri)
{

    return   $_SERVER["REQUEST_URI"] === $uri;
};
function authorize($condition, $status = Response::FORBIDDEN)
{

    if (!$condition) abort($status);
}


function basePath($path = '')
{


    return __DIR__ .'\..\\'. "\\$path";
}

function component($partial, $params = [])
{
    extract($params);

    require basePath('views/partials/') . $partial . '.php';
}
