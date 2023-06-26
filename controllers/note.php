<?php

require('./Database.php');


//Db connection 
$config = require('./config.php');
$db = new Database($config['database']);

$noteId = $_GET['id'];


$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->oneOrFail();


authorize($note['user_id'] === 1);


$title = 'Note';
$headerTitle = 'Note';
require('./views/note.view.php');
