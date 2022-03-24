<?php
   $appName = "Bioblog"; // cree une variable qui contiens bioblog 
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $appName ?><?= isset($title) ? " - $title" : '' ?></title>  <!-- voir racoursit /on teste pour afficher le titre si il y a quelque chose dzns title si il y a rien on met rien  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> <!--lien bootstrap css-->


</head>