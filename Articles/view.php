<!-- Partie html se qui se voit     la view n'a pas acces au model et a l'index -->
<?php require_once "../helpers/form-helper.php"; ?> <!-- pour recupere ce que il y a dans helpers -->

<!DOCTYPE html>
<html lang="fr">
<?php $title = "Acceuil" ; require "../head.php" ?> <!-- Require = mettre tout ce que il y a dans le head ici  et le $title c est pour que on sache quoi afficher -->
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
                <p class="card-text"><?= $article["content"]?></p> 
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

   <?php require "../footer.php"; ?>
</body>
</html>