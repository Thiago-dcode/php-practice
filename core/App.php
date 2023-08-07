<?php

declare(strict_types=1);

namespace Core;


class App
{

    protected static $container;

    public static function setContainer(Container $container): void
    {

        static::$container = $container;
    }

    public static function container(): Container
    {
        return static::$container;
    }

    public static function resolve(string $key)
    {

        return static::container()->resolve($key);
        
    }
}
