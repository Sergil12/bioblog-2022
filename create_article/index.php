<?php

require "model.php";
require "../helpers/form-helper.php"; // on require pour pouvoir utiliser la fonction sanitize_input en dessous vu que on a deplacer la fonction dans helpers 
require "../helpers/auth-helper.php";

Function validateInputs($inputs) { // valide les inputs
    $errors =[]; // ca contindras les erreurs dans un tableau 
    if (empty(trim($inputs['title']))) {//verifier si c'est vide  
       $errors['title'] = 'Titre est requis';
    }
    if (empty(trim($inputs['content']))) {//verifier si c'est vide on met dans le tableau car c'est pas correct  
        $errors['content'] = 'Contenu est requis';
     }
    return $errors; // resultat = erreur si il y a rien ca le met dans le tableau 
}
   
if ($_SERVER['REQUEST_METHOD']==='POST') { //verifier si c'st un post = if(isset($_post)) 

    $validations= validateInputs($_POST); //c'est le tableau d'erreur

    $article = [
        'title' => sanitize_input($_POST['title']), //sanitize_input pour les truc froduleux
        'content' => sanitize_input ($_POST['content']), //on recupere ce que il y a dans titre et contenu et on les met dans un tableau
    ];

    if(sizeof($validations)=== 0){ //si le tableau est vide c'est bon 
        try{ //PROTECTION
            insertArticle($article); // si c'et ok ca va me l'ajouter a la db 
            redirect('../articles');
            //header('location:../articles');//Si on reusis a enregistrer dans la db on affiche la liste des articles 
            //echo "C'est ok !";
            //var_dump($validations); //voir ce que il y a dans $valisations
        }catch (PDOException $exception){

        }   
    }
} 


require "view.php"; //ca relie model et view ensemble //jamais de php apres view toujours en deniers 