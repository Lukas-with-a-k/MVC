<?php 

class Pages extends AbstractController   {


    public function __construct() {

 
    }
    
    public function index() {
        $data = [
            'title' => 'landing Page',
        ];

        $this->render('index', $data);
    }

    public function about() {

        $data = [
            'title' => 'About page',
        ];
        $this->render('about', $data);
    }
}