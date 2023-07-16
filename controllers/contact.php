<?php

class Contact
{

    public function index()
    {

        view('contact/index', [
            'title' => 'About',
            'headerTitle' => 'About page'
        ]);
    
    }
};
