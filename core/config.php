<?php

namespace Core;


class Config
{

    public static function db()
    {


        return  [
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'myapp',
            'charset' => 'utf8mb4'

        ];
    }
}
