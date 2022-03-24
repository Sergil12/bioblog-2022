
<?php //ajouter l'article en DB

require_once "../config/db.php"; // c'est la connexions a la db

function insertArticle($article){
    global $db_default_connection; //pour donner l'acces a la base de donner dans function 
    $query="INSERT INTO articles(title, content, creation_date) VALUES(:title, :content, now())"; //on insert dans la db 
    $stmt= $db_default_connection->prepare ($query);
    $stmt ->execute($article);
    return $stmt;
}