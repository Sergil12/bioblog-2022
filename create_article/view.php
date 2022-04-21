<!DOCTYPE html>
<html lang="fr">
<?php $title = "Creations articles" ; require "../head.php" ?> <!-- Require = mettre tout ce que il y a dans le head ici  et le $title c est pour que on sache quoi afficher -->
<body>
   <?php require "../header.php"; ?><!-- on ajoute ce que il y a dans le footer et le header-->

      <div class="container">
         <H1> Création d'article</H1>
         <form
             action="" 
             method="POST"
             enctype="multipart/form-data"> <!--ca permet d'envoyer le formulaire en form data -->
<!-- action c'est ou on envois la requete post ce que il ya dans le formulaire -->
            <div class="form-group">
                <label>
                    Titre
                    <input class="form-control" 
                           type ="Text"
                           name="title" 
                           placeholder="Title" 
                           maxlength="50"
                           value="<?= isset($article) ? $_POST['title'] : '' ?>"/> <!-- placeholder="Titre" = ce qui fait mit avant que on tape et la ligne value c'est pour que les donner reste meme si on remplis pas tout  --></input> 
                </label>
                <?php if (isset($validations)&& isset($validations['title'])): ?>  <!-- c'est le message d'erreure si il y a une erreur et que title est dans le tableau d'erreur-->
                    <p><?= $validations['title']?></p> <!-- c'est le message d'erreure-->
                <?php endif;?>
            </div>
            <div class="form-group">
                <label>
                    Contenu
                    <textarea
                        class="form-control"
                        name="content"
                        maxlength="1000"><?= isset($article) ? $_POST['content'] : '' ?></textarea>
                </label>
                <?php if (isset($validations)&& isset($validations['content'])): ?>  <!-- c'est le message d'erreure si il y a une erreur et que content est dans le tableau d'erreur-->
                    <p><?= $validations['content']?></p> <!-- on affiche ca c'est le message d'erreure-->
                <?php endif;?>
            </div>

            <div class="form-group">
                <label>
                    Image
                    <input
                          class="form-control"  
                          type="file"
                          name="image"  
                          accept="image/*"  
                          /> <!-- grace a se formulaire on peu aller chercher une image et grace au name on le retrouve dans le $post-->
                </label>
            </div>


            <button type="submit" value="Envoyer" class="btn btn-primary">Envoyer</button>


         </form>
      </div>
   <?php require "../footer.php"; ?>
</body>
</html>