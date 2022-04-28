<!DOCTYPE html>
<html lang="fr">
<?php $title = "Creations articles" ;  $site_description = "Vous pouvez crée ici votre propre articles BIO personaliser"; require "../head.php" ?> <!-- Require = mettre tout ce que il y a dans le head ici  et le $title c est pour que on sache quoi afficher -->
<body>
   <style>
       .ql-container.ql-snow.-error {
           border: solid red ;
       }
   </style>
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
                    <!--<textarea
                        class="form-control"
                        name="content"
                        maxlength="1000"><?= isset($article) ? $_POST['content'] : '' ?></textarea> pour incruster le wysiwig on supprime le texte area-->
                    <div id="editor"></div>
                    <input type="hidden" name ="content"/> <!--on crée un input cacher pour que il puissent reconnaitre le content-->
                </label>
                <?php if (isset($validations)&& isset($validations['content'])): ?>  <!--c'est le message d'erreure si il y a une erreur et que content est dans le tableau d'erreur-->
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


            <button type="submit" value="Envoyer" class="btn btn-success">Envoyer</button>


         </form>
      </div>
   <?php require "../footer.php"; ?>
  <!-- toujours le js en fin de fichiers -->
   <script>
       var quill = new Quill('#editor',{   //creee une variable (ou on va le mettre)
           theme : 'snow',
           placeholder: "ton super article ici !",
           modules: {
               toolbar: [ //c'est la bare de modification gras h2,h3,h4
                   [{'header': [2,3,4,false]}], //afficher h2,h3,h4,et false = normale
                   ['bold','italic'], //gras, italic
                   ['video'], //ajouter une video
                   ['clean'] //supprimer tout les style 
               ]
           }
       }); 
       var form = document.querySelector('form'); //il recupere le formulaire pour manipuler ce que l'on veux 
       form.onsubmit = function() {
           var contentInput = document.querySelector('input[name=content]');//recuperer ce que il y a dans editor et le mettre dans input content
           var contentToSave = quill.getContents(); //recuperer la valeur
           if(contentToSave.ops.length === 1 && Object.keys(contentToSave.ops[0]).length === 1 && contentToSave.ops[0].insert.trim().length === 0){ //verifier si il y a du contenu dans l'editor
             document.querySelector('#editor').className = 'ql-container ql-snow -error'; //on enelve l'erreure si c'est un succes 
             return false; 
           } else {  //dans le cas ou il y a une valeur dans editor
               contentInput.value = JSON.stringify(contentToSave); //on la sauve 
               document.querySelector('#editor').className = 'ql-container ql-snow ';
               return true; 
           }
       };
       //on fait le liens entre le fichier editor et le input content
   </script>
</body>
</html>