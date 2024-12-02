<?php 

class Router  {
    // Visibilité des props et methods 
    // Private : on accède à la prop ou method uniquement dans la classe
    // Protected : on accède à la prop ou method dans la classe et les classes qui en héritent
    // public : on accède à la prop ou method partout
    private $currentController = 'Pages';
    private $currentMethod = 'index';
    private $params = [];

    public function __construct() {
        // récupère l'url
        $url = $this->getUrl();

        // récupère le premier param de l'url et on défini le controller courant 
        if(!empty($url) && isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        //  Récuéprer & instancier le controller

        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;
  

        // véifier le deuxième param de l'url et récupérer la méthode du controller
        if(isset($url[1]))  {
           if(method_exists($this->currentController, $url[1])){
            $this->currentMethod = $url[1];
            unset($url[1]);
           }
        }

        // Vérifier le troisième param de l'url et récupérer les paramètres
        // On vérifie si l'url est vide, si c'est le cas on met un tableau vide, sinon on met les valeurs de l'url
        // array_value permet de réindexer & récupérer le tableau
        $this->params = $url ? array_values($url) : [];
     

        // Appeler le controller + méthode + param en fonction de ce qui est défini das l'url 
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    // fonction pour récupérer l'url et la sécuriser
    public function getUrl(){
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
            }
    }

}