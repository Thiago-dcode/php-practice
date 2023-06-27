<?php

require 'controllers/Home.php';
require 'controllers/About.php';
require 'controllers/Notes.php';
require 'controllers/Contact.php';


return $routes = [

    'GET' =>
    [
        '/' =>  [Home::class, 'index'],
        '/about' => [About::class, 'index'],
        '/notes' => [Notes::class, 'index'],
        '/note' => [Notes::class, 'read'],
        '/notes/create' => [Notes::class, 'edit'],
        '/contact' =>   [Contact::class, 'index'],
    ],
    'POST' => [
        '/notes' => [Notes::class, 'create'],


    ],
    "DELETE" => [
        '/notes' => [Notes::class, 'destroy']
    ]


];
