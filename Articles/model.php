<!--Acces au donner connexions DB-->
<?php

require_once "../config/db.php";// require_once ca affiche que une fois la connexion a la db

function getArticles($page) { //recupere ert afficher les articles
      global $db_default_connection ;// on met global car elle a pas ete initier ici
      $offset = ($page -1) * ROW_PER_PAGE;//on doit cpnstruire la limite d'article part page avec le $page-1 ca veux dire offset = 0
      $query ="SELECT id, title, content, creation_date, image FROM articles LIMIT {$offset}," . ROW_PER_PAGE ; //on dit donc que la limit est de 3 (row_PER-page) et offset commence a 0 $page-1 //On met la requete sql et on ajoute image
      $stmt = $db_default_connection ->prepare ($query);//prepare cette requete la a etre executer 
      $stmt->execute();// On execute la requete
      return $stmt; //$stmt c'est le resultat de la requete
}

function getMappedArticles($page){  // transformer un type d'objet a un autre d'un stmt a une liste 
      $stmt = getArticles($page);
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