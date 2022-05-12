<!-- Partie html se qui se voit     la view n'a pas acces au model et a l'index -->
<?php include "../vendors/autoload.php";?> <!-- permet de charger la librairie ou les qui a -->
 <!-- pour recupere ce que il y a dans helpers -->

<!DOCTYPE html>
<html lang="fr">
<?php $title = "Articles" ; $site_description = "Vous pouvez trouver ici la liste de tout nos articles"; require "../head.php" ?> <!-- Require = mettre tout ce que il y a dans le head ici  et le $title c est pour que on sache quoi afficher -->
<body>
   <?php require "../header.php"; ?><!-- on ajoute ce que il y a dans le footer et le header on met ../ car on remonte d'un dossier -->

   <div class= "container mt-3"> <!-- mt-3 mettre une marge -->
    <div class ="row">
       <?php foreach($articles_list as $article): ?> <!-- on boucle pour chaque articles_list tu cree  un article -->
         <div class="col-md-4 mb-4"> <!--pour que il y aie 3 article max part ligne le md c'est pour dire que des que on arrive a une dimention comme tablette ou mobile on met que 1-->
           <article class="card"> <!-- ca fait une carte et  des encadrement -->
             <?php if(isset($article['image'])): ?> <!--si la condition est fausse ce qui a entre cette ligen de php et le endif 4 ligne en dessous c'est comme si ca etait pas la -->
           <img class= "card-img-top"
                   src ="<?= $article['image'] ?>" 
                   alt = "image of <?= $article["title"] ?>" />  <!--on mit l'image dans HTML -->
             <?php endif; ?> 
              <div class="card-body">
                <h5 class="card-title"><?= $article["title"]?></h5> <!-- le titre de l'artcile sera le titre de la carte avec style -->
                <time class="card-subtitle"><?= date_format ($article["creationDate"],"d/m/Y")?></time> 
                <?php
                  try {  //pour blinder 
                    $quill = new \DBlackborough\Quill\Render($article["content"]); // rendre le texte dans le content qui est avec des ))§(()) en vrais mot html
                    $content = $quill->render();
                 }catch(Exception $e){ //si il arrive pas en cas d'erreure
                    $content = $article["content"];
                 }
                ?>
                <p class="card-text"><?= $content?></p> 
              </div>
           </article>
         </div>
         <!--<?= $article["title"] ?>  on affiche les titre sans style--> 
       <?php endforeach;?>
    </div>
    <div>
      <?php if($page > 1):?> <!-- pour pas que ca beug si on revient en arriere a la page 0-->
        <a href ="<?=getSelfUrl()?>?page=<?= $page-1?>"class="float-left btn btn-success">Précedent</a> 
        <?php endif; ?>
        <?php if(count($articles_list)=== ROW_PER_PAGE) : ?>
        <a href ="<?=getSelfUrl()?>?page=<?= $page+1?>"class="float-right btn btn-success">Suivant</a>
        <?php endif; ?>
    </div>
   </div>

   <?php


        function expose($nbr,$exp) {
          $result = 0;
          $result =$nbr; //resultat = 5 car en bas dans $result = expose on a dit que $number_to_expose (5) = $nbr

          for($i = 0; $i < ($exp - 1); $i++ ){ //$i = 0 = on part de 0 et tant que $i est plus petit que $exp = l'exposant (2) tu boucle et on met -1 car au dessus il ya deja un exposant de calculer $i++ pour acrementer pour que il ajoute 1
            $result = $result * $nbr; //on boucle se calcul $result= 5x5 ($result * $nbr)
          }
          return $result;

        }

        $number_to_expose = 5;
        $exposant_to_apply =6;

        $result = expose($number_to_expose,$exposant_to_apply);
        echo $result;
        echo '</br>';
        echo expose (10,3); //on rajoute un autre calcule en plus (10³)

  ?>

   <?php require "../footer.php"; ?>
</body>
</html>