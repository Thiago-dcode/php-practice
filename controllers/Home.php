<?php


class Home
{


    public function index()
    {

        view('index', [
            'title' => 'Home',
            'headerTitle' => 'Home page'
        ]);
    }
}
