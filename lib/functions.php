<?php
function abort($code = 404)
{
    switch ($code) {
        case 404:
            http_response_code($code);
            require "views/{$code}.view.php";
            break;
            case 403:
                http_response_code($code);
                require "views/{$code}.view.php";
                break;
            
        default:
            # code...
            break;
    }

  
    die();
}



function dd($value)
{

    echo '<pre>';
    var_dump($value);

    echo '<pre>';

    die;
};

function printData($str,$tag){

    echo "<$tag>$str</$tag>";
};

function urlIs($uri)
{
    
    return   $_SERVER["REQUEST_URI"] === $uri;
};
function authorize($condition,$status = Response::FORBIDDEN){

    if(!$condition) abort($status);
}