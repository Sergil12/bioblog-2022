<!---Manipulations de donner controleur -->
<?php  

require "./model.php";

$articles_list = getMappedArticles(); // on fait le liens entre le model et la view

require "./view.php";
