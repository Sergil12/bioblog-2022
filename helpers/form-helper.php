<?php // fonction pour les formulaire


function sanitize_input($data){ //Pour que des scrip froduleux ne puissent pas etre enregistrer 
    $data = trim($data);
    $data = stripslashes($data); 
    $data = htmlspecialchars($data);
    return $data;
}