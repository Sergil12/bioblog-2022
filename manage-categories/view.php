<!DOCTYPE html>
<html lang="fr">
<?php $title = "Creations categories" ;  $site_description = "Vous pouvez crée ici votre propre categories"; require "../head.php" ?> <!-- Require = mettre tout ce que il y a dans le head ici  et le $title c est pour que on sache quoi afficher -->
<?php require "../header.php"; ?> <!-- on ajoute ce que il y a dans le footer et le header-->
<body>
<div class="container">
    <H2> Création de categories</H2>
    <br>
    <?php foreach( $_SESSION['categories']as $categories): ?>
        <form class="card mb-4" action ="" method="POST">
            <div class ="card-body">
                <div class ="row">
                    <div class="form-group col-9 ">
                        <input type = "hidden" name="id" value="<?= $categories['id'] ?>"/>
                        <input type="text" 
                               class ="form-control" 
                               name="name"
                               maxlength="50"
                               value="<?= $categories['name'] ?>"/>
                    </div>
                    <div class="col-3">
                        <input type="submit" 
                               value="sauver"
                               name="name"
                               class="btn btn-primary"/>
                        <input type="submit" 
                               value="Supprimer"
                               name="name"
                               class="btn btn-danger"/>
                    </div> 
                </div>
            </div>
        </form>
    <?php endforeach ; ?>
    <form
             action="" 
             method="POST"
             enctype="multipart/form-data"
             class="card mt-5">
    <div class ="card-body">
      <h5 class="card-title">Création</h5>
        <div class="row">
            <div class="form-group col-11 mt-0">
                    <input class="form-control" 
                           type ="Text"
                           name="name" 
                           placeholder="Entrer un nom de categories" 
                           maxlength="50"
                           require/>   
            </div>
            <div class="col-1">
                 <button type="submit" name="create" value="Crée" class="btn btn-success">Créer</button>
            </div>
        </div>
    </div>
    </form>
</div>
    <?php require "../footer.php"; ?>
</body>
</html>