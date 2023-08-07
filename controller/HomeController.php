<?php
namespace Controller;

use core\View;

class HomeController
{


    public function index()
    {


        View::render('index', [
            'title' => 'Home',
            'headerTitle' => 'Home page'
        ]);
       
    }
}
