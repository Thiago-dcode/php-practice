<?php



use Core\Database;
//reading notes data



class Notes
{
    //Db connection 

    private $db;
    function __construct()
    {
        $config = require(basePath('core/config.php'));
       
        $this->db = new Database($config['database']);
    }

    public function index()
    {


        //reading notes data

        $notes = $this->db->query("select * from notes")->allOrFail();
        $users = $this->db->query("select * from users")->allOrFail();

        view('notes/index', [
            'title' => 'Notes',
            'headerTitle' => 'Notes page',
            'notes' => $notes,
            'users' => $users

        ]);
    }
    public function read()
    {
        if (!isset($_GET['id'])) {
            redirect('notes');
        }

        $note = $this->db->query("select * from notes where id = :id", ['id' => $_GET['id']])->oneOrFail();
        $user = $this->db->query("select * from users where id = :id", ['id' => $note['user_id']])->oneOrFail();


        authorize($note['user_id'] === 1);

        view('notes/note', [
            'title' => 'Note',
            'headerTitle' => 'Note page',
            'note' => $note,
            'user' => $user
        ]);
    }
    public function edit()
    {

        $title = 'New Note';
        $headerTitle = 'Create Note page';
        view('notes/createNote', [
            'title' => 'New note',
            'headerTitle' => 'Create note page',

        ]);
    }
    public function create()
    {
        require basePath('validator.php');

        $error  = [];
        $note = $_POST['note'];

        if (!isset($note)) {
            $error['body'] = 'Something went wrong, try again';
        }
        if (!Validator::string($note, 3, 250)) {

            $error['body'] = 'A note must have a lenght between 3 and 1000 characters';
        }


        if (empty($error)) {

            $query = "INSERT INTO notes (body, user_id) VALUES (?, ?)";

            $lastId = $this->db->query($query, [$note, 1])->getLastId();
            $this->db->close();
            redirect("note?id={$lastId}");
        }
        view('notes/createNote', [
            'title' => 'New note',
            'headerTitle' => 'Create note page',
            'error' => $note,
            'error' => $error
        ]);
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
