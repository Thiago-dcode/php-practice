<?php

require('./Database.php');


//Db connection 
$config = require('./config.php');
$db = new Database($config['database']);

//reading notes data

$notes = $db->query("select * from notes")->allOrFail();
$users = $db->query("select * from users")->allOrFail();
 

$title = 'Notes';
$headerTitle = 'Notes';
require('./views/notes.view.php');
