<?php

use Controller\AboutController;
use Controller\ContactController;
use Controller\HomeController;
use Controller\NotesController;
use Core\Router;

const BASE_PATH = __DIR__ . '/../';

require(BASE_PATH . 'core/functions.php');

spl_autoload_register(function ($class) {

  $class = strtolower($class);
  require basePath("{$class}" . '.php');
});

require(basePath('bootstrap.php'));

$router = new Router();



//add your routes here :

//get

$router
  ->get('/', [HomeController::class, 'index'])
  ->get('/about', [AboutController::class, 'index'])
  ->get('/contact', [ContactController::class, 'index'])
  ->get('/notes', [NotesController::class, 'index'])
  ->get('/note', [NotesController::class, 'show'])
  ->get('/notes/create', [NotesController::class, 'new'])
  ->get('/notes/edit', [NotesController::class, 'edit'])
  ->post('/notes', [NotesController::class, 'create'])
  ->patch('/notes', [NotesController::class, 'update'])
  ->delete('/notes', [NotesController::class, 'destroy']);




//Handling routes


$router->init();
