<!---Manipulations de donner controleur -->
<?php  

//cree une constante qui defini le nombre de ligne part page 
define('ROW_PER_PAGE',3); //on defini que le nombre de artciles part page est 3

require "./model.php";

$page = 1; //page part defaut 
if (!empty($_GET["page"])) { //si dans l'url il y a page=1 alors plutot que mettre 1 on mettreas 2
    $page = (int)$_GET["page"]; // "1" => 1
}


$articles_list = getMappedArticles($page); // on fait le liens entre le model et la view

require "./view.php";
