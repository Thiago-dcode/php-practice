<?php

declare(strict_types=1);

namespace Core;


use Core\Exception\ServicesNotFoundException;

class Container
{

    private $services = [];

    public  function bind(string $key, callable $callback): Container
    {
       
     
        if (!is_callable($callback)) {
           
            throw new \Exception(" ");
        }
        $this->services[$key] = $callback;
        return $this;
    }


    public function resolve(string $key): mixed
    {
       
        if (!array_key_exists($key, $this->services)) {

            throw new   ServicesNotFoundException("The service: \"$key\", does not exists");
        };
        return call_user_func($this->services[$key]);
    }
}
