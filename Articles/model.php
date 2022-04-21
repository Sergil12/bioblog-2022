<!--Acces au donner connexions DB-->
<?php

require_once "../config/db.php";// require_once ca affiche que une fois la connexion a la db

function getArticles() { //recupere ert afficher les articles
      global $db_default_connection ;// on met global car elle a pas ete initier ici
      $query ="SELECT id, title, content, creation_date, image FROM articles"; //On met la requete sql et on ajoute image
      $stmt = $db_default_connection ->prepare ($query);//prepare cette requete la a etre executer 
      $stmt->execute();// On execute la requete
      return $stmt; //$stmt c'est le resultat de la requete
}

function getMappedArticles(){  // transformer un type d'objet a un autre d'un stmt a une liste 
      $stmt = getArticles();
      $count = $stmt->rowCount(); //on compte cb il y a d'article 

      $articles_list =[]; //cree une liste vide

      if($count > 0){  // si il y a au moin 1 articles
        while($article = $stmt-> fetch(PDO::FETCH_ASSOC)){ // fetch = le prochain artcile est sauver dans la variable $article
       
           $mapped_article=[
                  "id"=> +$article["id"], // obliger de mettre le + car dans la db il est en auto increment
                  "title"=> $article["title"],   // AVEC MAPPED on tranforme le resultat de la abse de donner en code 
                  "content"=> $article["content"],
                  "creationDate"=> date_create($article["creation_date"]),
                  "image" => $article["image"] //on ajoute image 
           ];

           array_push($articles_list,$mapped_article);//tu met une valeur dans un tableau:list tu met les mapped article dans $articles

        }

      }
   
      return $articles_list; 
}

?>