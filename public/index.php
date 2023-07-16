<?php
const BASE_PATH = __DIR__.'/../';

require(BASE_PATH.'core/functions.php');



spl_autoload_register(function($class){
 
  $class = strtolower($class);
  require basePath("{$class}". '.php');  
});

require basePath('core/router.php');