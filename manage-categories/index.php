<?php
require "./model.php";
require_once "../helpers/auth-helper.php"; 


init_session(); // si c'est true on initialise le start_session iln'est plus false et on a acces a $_SESSION 

if(!isset($_SESSION['categories'])){
    $_SESSION['categories'] = [];
}

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
    if(isset($_POST['save'])) { //quand on clique sur le bouton save 
        //$index = array_search($_POST['id'], $_SESSION['categories']);//recuperer l'emplacement dans le tableau d'un element
        foreach($_SESSION['categories'] as $key => $category){ //on recupere chaque element du tableau (array) represente chaque categorie
            if(strval($category['id']) === $_POST['id']){ //if ID qui a dans category = Id de la categorie sur la quelle on est 
                //(strval($....)//convertir number en un string 
                $_SESSION['categories'][$key]['name'] = $_POST['name'];//recupere l'element de l'index puis modifier son nom 

                /*$category = $_SESSION['categories']; //on recupere la liste des categories de la session 
                $current_category = $categories[$key];//on recupere une categories de la liste 
                $current_category['name'] =  $_POST['name'];//on modifie le noms de cette categorie */

            break;//case la boucle quand il a trouver
        }
    }   
        
    }
    if(isset($_POST['delete'])){ //quand on clique sur le bouton delete


        function filter_category($category){ //on va filtrer si on le garde ou pas 
            return strval($category['id']) === $_POST['id'];//si ca est egale a ca c'est vrais et si c'est pas egale c faux
        }
        $_SESSION['categories'] = array_filter($_SESSION['categories'], 'filter_category'); //il demande a la function si il doit garder ou pas
    }
}




require "./view.php";

?>