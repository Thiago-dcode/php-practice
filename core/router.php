<?php

namespace Core;





class Router
{

    private $routes;

    private function add($method, $path, $classMethod)
    {

        $this->routes[$method][$path] = $classMethod;
    }

    public function get($path, $classMethod)
    {
        $this->add('GET', $path, $classMethod);
        return $this;
    }
    public function post($path, $classMethod)
    {
        $this->add('POST', $path, $classMethod);
        return $this;
    }
    public function delete($path, $classMethod)
    {

        $this->add('DELETE', $path, $classMethod);
        return $this;
    }
    public function patch($path, $classMethod)
    {


        $this->add('PATCH', $path, $classMethod);
        return $this;
    }

    private function getMethod()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($_POST['_method'])) {


            switch (strtoupper($_POST['_method'])) {
                case 'DELETE':

                    $method = 'DELETE';
                    var_dump($method);
                    break;
                case 'PATCH':
                    $method = 'PATCH';
                    break;

                default:

                    break;
            }
        }

        return $method;
    }


    private function resolve()
    {
        if (!$this->routes) return;

        $uri = parse_url($_SERVER["REQUEST_URI"])["path"];


        $method = $this->getMethod();

        if (!array_key_exists($method, $this->routes)) {

            //TODO: new route to status code 405
            abort();
        }

        if (!array_key_exists($uri, $this->routes[$method])) {
            abort();
        }
        [$class, $func] = $this->routes[$method][$uri];

        call_user_func_array([new $class, $func], []);
    }

    public function init()
    {

        $this->resolve();
    }
}
