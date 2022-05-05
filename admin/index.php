<?php

require_once '../helpers/auth-helper.php'; //Avoir acces au init_session

prevent_not_connected(true); // si c'est true on initialise le start_session iln'est plus false et on a acces a $_SESSION 

require './model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //du bouton deconnexion 
    if (isset($_POST['deconnexion'])) { //si on clique sur le bouton deconnexion 
        $_SESSION['login'] = NULL; //on supprime l'element que on a enregistrer dans login 
        session_destroy(); //ca detruit la sesion pour apres mais pas le $_SESSION
    }
}

prevent_not_connected(false) ;//ca redirige vers la page login

require './view.php'; //liens