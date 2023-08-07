<?php

use Core\App;
use Core\Container;
use Core\Database;
use Core\Config;

//Binding services:

$container = new Container;


$container->bind(Database::class, function () {
    return new Database(Config::db());
});

App::setContainer($container);
