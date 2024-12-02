<?php

class AbstractController{

    public function model($model){
        // appel du model
        require_once '../app/models/' . $model . '.php';
        // instanciation du model
        return new $model();
    }


    public function render($view, $data = []){
        $controllerName = strtolower(get_called_class());
        // appel de la vue
        if(file_exists('../app/views/' .$controllerName. '/' .$view . '.php')){
        require_once '../app/views/' .$controllerName. '/' .$view . '.php';
        }else{
            die('La vue n\'existe pas');
        }
    }
}