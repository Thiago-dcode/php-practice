<?php

require('./Database.php');




//reading notes data



class Notes
{
    //Db connection 

    private $db;
    function __construct()
    {
        $config = require('./config.php');
        $this->db = new Database($config['database']);
    }

    public function index()
    {

        $title = 'Home';
        $headerTitle = 'Home page';
        //reading notes data

        $notes = $this->db->query("select * from notes")->allOrFail();
        $users = $this->db->query("select * from users")->allOrFail();

        require "./views/notes.view.php";
    }
    public function read()
    {


        $note = $this->db->query("select * from notes where id = :id", ['id' => $_GET['id']])->oneOrFail();


        authorize($note['user_id'] === 1);


        $title = 'Note';
        $headerTitle = 'Note';
        require('./views/note.view.php');
    }
    public function edit()
    {

        $title = 'New Note';
        $headerTitle = 'Create Note page';
        require './views/createNote.view.php';
    }
    public function create()
    {
        require './Validator.php';
        
        $error  = [];
        $note = $_POST['note'];

        if (!isset($note)) {
            $error['body'] = 'Something went wrong, try again';
        }
        if(!Validator::string($note,3,250)){

            $error['body'] = 'A note must have a lenght between 3 and 1000 characters';
        }
     
      
        if (empty($error)) {

            $query = "INSERT INTO notes (body, user_id) VALUES (?, ?)";

            $lastId = $this->db->query($query, [$note, 1])->getLastId();
            $this->db->close();
            header("Location: http://localhost:8888/note?id={$lastId}", TRUE, 301);
            exit();
        }
        require './views/createNote.view.php';
    }
    public function destroy()
    {

        $noteId = $_POST['id'];


        $query = "DELETE FROM notes where id = ?";

        $this->db->query($query, [$noteId]);
        $this->db->close();
        header("Location: http://localhost:8888/notes", TRUE, 301);

        exit();
    }
}
