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
    public function create()
    {

        $note = $_POST['note'];

        $query = "INSERT INTO notes (body, user_id) VALUES (?, ?)";

        $lastId = $this->db->query($query, [$note, 1])->getLastId();

        header("Location: http://localhost:8888/note?id={$lastId}", TRUE, 301);

        exit();
    }
}
