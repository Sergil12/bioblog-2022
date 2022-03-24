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
                           required maxlength="50"/> <!-- placeholder="Titre" = ce qui fait mit avant que on tape  --></input>
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
                        required maxlength="1000"></textarea>
                </label>
                <?php if (isset($validations)&& isset($validations['content'])): ?>  <!-- c'est le message d'erreure si il y a une erreur et que content est dans le tableau d'erreur-->
                    <p><?= $validations['content']?></p> <!-- on affiche ca c'est le message d'erreure-->
                <?php endif;?>
            </div>
            <button type="submit" value="Envoyer" class="btn btn-primary">Envoyer</button>


         </form>
      </div>
   <?php require "../footer.php"; ?>
</body>
</html>