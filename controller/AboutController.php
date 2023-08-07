<?php


namespace Controller;
use core\View;
class AboutController {


    public function index(){

        View::render('about/index', [
            'title' => 'About',
            'headerTitle' => 'About page'
        ]);
    

    }

}