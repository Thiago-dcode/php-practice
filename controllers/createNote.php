<?php



function createNote(){

    require('./Database.php');


    //Db connection 
    $config = require('./config.php');
    $db = new Database($config['database']);
    
    
    $note = $_POST['note'];
   
    $query = "INSERT INTO notes (body, user_id) VALUES (?, ?)";

    $lastId = $db->query($query,[$note, 1])->getLastId();

    header("Location: http://localhost:8888/note?id={$lastId}", TRUE, 301);

    exit();
    
    

    
}



switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        require './views/createNote.view.php';
        break;
    case 'POST':
        createNote();
    default:
        # code...
        break;
}


