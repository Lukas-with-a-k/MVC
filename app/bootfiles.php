<?php
session_start();
// cores
// require_once 'cores/Router.php';
// require_once 'cores/AbstractController.php';
// require_once 'cores/DataBase.php';

// spl_autoload_register permet de charger tous les fichiers présent dans le dossier cores 
spl_autoload_register(function ($class) {
    require_once 'cores/' . $class . '.php';
});

// config
require_once 'config/config.php';


// Helpers
// require_once 'helpers/url_helper.php';
// require_once 'helpers/session_helper.php';
// require_once 'helpers/flash_helper.php';
// require_once 'helpers/dump_helper.php';

// glob retourne un tableau contenant les chemins des fichiers ou dossier correspondant au masque donné
// __DIR__ est une constante magique qui retourne le chemin absolu du dossier du fichier courant
foreach (glob(__DIR__ . '/helpers/*.php') as $helperFile) {
    require_once $helperFile;
}
