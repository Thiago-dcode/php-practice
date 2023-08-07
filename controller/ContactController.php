<?php
namespace Controller;
use core\View;
class ContactController
{

    public function index()
    {

        View::render('contact/index', [
            'title' => 'About',
            'headerTitle' => 'About page'
        ]);
    
    }
};
