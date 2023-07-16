<?php

require basePath('controllers/Home.php');
require basePath('controllers/About.php');
require basePath('controllers/Contact.php');
require basePath('controllers/Notes.php');


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
