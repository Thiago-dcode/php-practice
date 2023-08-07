<?php

namespace Controller;

use Core\App;
use Core\Database;

use Core\Validator;
use Core\View;
use Model\Notes;
use Model\Users;

//reading notes data



class NotesController
{
    //Db connection 
    private $notes;
    private $users;
    function __construct()
    {


        $this->notes = new Notes();

        $this->users = new  Users();

    }

    public function index()
    {


        //reading notes data

        $notes = $this->notes->all();

        $users = $this->users->all();

        view::render('notes/index', [
            'title' => 'Notes',
            'headerTitle' => 'Notes page',
            'notes' => $notes,
            'users' => $users

        ]);
    }
    public function show()
    {
        if (!isset($_GET['id'])) {
            redirect('notes');
        }


        $note = $this->notes->one($_GET['id']);

        $user = $this->users->one($note['user_id']);


        authorize($note['user_id'] === 1);

        view::render('notes/note', [
            'title' => 'Note',
            'headerTitle' => 'Note page',
            'note' => $note,
            'user' => $user
        ]);
    }
    public function new()
    {

        view::render('notes/create', [
            'title' => 'New note',
            'headerTitle' => 'Create note page',

        ]);
    }
    public function create()
    {


        $error  = [];
        $body = $_POST['note'];

        if (!isset($body)) {
            $error['body'] = 'Something went wrong, try again';
        }
        if (!Validator::string($body, 3, 250)) {

            $error['body'] = 'A note must have a lenght between 3 and 1000 characters';
        }


        if (empty($error)) {



            $lastId = $this->notes->create([$body, 1]);

            redirect("note?id={$lastId}");
        }
        view::render('notes/create', [
            'title' => 'New note',
            'headerTitle' => 'Create note page',
            'note' => $body,
            'error' => $error
        ]);
    }

    public function edit()
    {


        if (!isset($_GET['id'])) {
            redirect('notes');
        }
        $note = $this->notes->one($_GET['id']);


        authorize($note['user_id'] === 1);

        View::render('notes/edit', [
            'note' => $note,
            'title' => 'Edit Note',
            'headerTitle' => 'Edit note page',

        ]);
    }

    public function update()
    {
        $error  = [];
        $note = $_POST['note'] ?? '';
        $note_id = $_POST['note_id'] ?? '';
        if (!$note && !$note_id) {
            $error['body'] = 'Something went wrong, try again';
        }
        if (!Validator::string($note, 3, 250)) {

            $error['body'] = 'A note must have a lenght between 3 and 1000 characters';
        }


        if (empty($error)) {

            $this->notes->update(['body' => $note], $note_id);

            redirect("note?id={$note_id}");
        }
        $note = $this->notes->one($_GET['id']);
        view::render('notes/edit', [
            'title' => 'Edit note',
            'headerTitle' => 'Edit note page',
            'note' => $note,
            'error' => $error
        ]);
    }

    public function destroy()
    {

        $noteId = $_POST['id'];


        $this->notes->delete($noteId);

        header("Location: http://localhost:8888/notes", TRUE, 301);

        exit();
    }
}
