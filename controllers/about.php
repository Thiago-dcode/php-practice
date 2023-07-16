<?php




class About {


    public function index(){

        view('about/index', [
            'title' => 'About',
            'headerTitle' => 'About page'
        ]);
    

    }

}