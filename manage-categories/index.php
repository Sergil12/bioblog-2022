<?php
require "./model.php";
require_once "../helpers/auth-helper.php"; 


init_session(); // si c'est true on initialise le start_session iln'est plus false et on a acces a $_SESSION 


if ($_SERVER['REQUEST_METHOD'] === 'POST') { //du bouton create
    if (isset($_POST['create'])) { //si on clique sur le bouton create
       //$_SESSION['categories']
       $latest = end($_SESSION['categories']);// pour calculer id et pas que il ecrase les autre elements ca renvois le derniers element d'une liste 
       if ($latest){ // SI derniers element d'une liste 
        array_push( //on pousse une categories dans la liste de categories
            $_SESSION['categories'],
            ['id' => ($latest['id'] + 1), 'name' => $_POST['name']] // on cree une categorie et ($latest['id'] + 1) on recupere le derniers id et on l'utilise comme id de la nouvelle categories
        );
       } else { // SI il y a PAS  element on cree une liste 
            $_SESSION['categories'] =[ //on stock la liste dans $_SESSION 
                ['id' =>1, 'name' => $_POST['name']] // on cree une categorie 
            ];
        }
       //var_dump($_SESSION['categories']); //afficher ce que $_SESSION  contiens
    }
}



require "./view.php";

?>