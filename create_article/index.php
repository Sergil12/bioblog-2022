<?php

require "model.php";
require "../helpers/form-helper.php"; // on require pour pouvoir utiliser la fonction sanitize_input en dessous vu que on a deplacer la fonction dans helpers 
require "../helpers/auth-helper.php";

init_session(); //pour que la page nous reirige vers la connexion si on est pas connecter pour pouvoir cree un artciles que si on est connecter
prevent_not_connected(false) ;

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
        'content' => ($_POST['content']), //on recupere ce que il y a dans titre et contenu et on les met dans un tableau
    ];//on rajoute la logique pour recuperer l'image dans l'input et la rajouter dans la db en dessous 

    
    if(sizeof($validations)=== 0){ //si le tableau est vide c'est bon 
        if (!empty($_FILES['image']['name'])) { //si il y a quelque chose dans FILES qui s'appelle image
            $_target_dir = '../uploads/'; //quelle est le dossier vers lequel on veux sauver les images
            $target_file = $_target_dir . $_FILES['image']['name']; //chemin complet vers ou on veux sauver l'image 
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);   //quel fichier on veux et ou on veux que il soit
            $article['image'] = $target_file;//on peut l'ajouter dans articles si il y a une image 
         }
         //die(); //on s'arrete la on teste avant de mettre dans la db
     
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