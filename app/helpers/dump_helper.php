<?php
// function dd (...$var) {
//     echo '<pre>';
//     var_dump($var);
//     echo '</pre>';
//     die();
// }

// array_map — Applique une fonction sur les éléments d'un tableau un peu comme un map en js
// func_get_args — Retourne un tableau contenant tous les arguments d'une fonction
function dd(){
    echo '<pre>';
    array_map(function($x) { var_dump($x); }, func_get_args());
    echo '</pre>';
    die();
  }