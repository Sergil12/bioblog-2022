<?php

require "model.php";

$jokeIndex = array_rand($jokes); //on recoit l'index 0-a-4

$theJoke = $jokes[$jokeIndex];
//retourner en json

header('Content-type: application/json; charset=UTF-8'); //modifier le header en php 
echo json_encode($theJoke); //retourner la valeur en json
//et la les blague s'affiche une a la fois aleatoirement 


?>