<?php
require 'controllers/Example.php';
require 'controllers/Home.php';
require 'controllers/About.php';
require 'controllers/Notes.php';


return $routes = [
    '/' =>  ['GET',Home::class, 'index'],
    '/about' => ['GET',About::class, 'index'],
    '/notes' => ['GET',Notes::class, 'index'],
    '/note' => ['GET',Notes::class, 'read'],
    '/notes/create' => 'controllers/createNote.php',
    '/contact' =>  'controllers/contact.php',
    '/example'=> ['GET',Example::class, 'index']
];

