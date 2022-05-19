<!DOCTYPE html>
<html lang="fr">
<?php $title = "joke" ;$site_description = "gad elmaleh"; require "../head.php" ?> <!-- Require = mettre tout ce que il y a dans le head ici  et le $title c est pour que on sache quoi afficher -->
<body>
  
   <?php require "../header.php"; ?> <!-- on ajoute ce que il y a dans le footer et le header-->

   <div class="container">
       <p id ="joke"></p>
   </div>
   
   <?php require "../footer.php"; ?>
   
   <script>
       var joke = document.querySelector('#joke'); //je veux recupere un elemejnt html en lui donnant un selecteur css

       function getNewJoke(){
            
            fetch('./get.php').then(r =>r.json()).then(response=>{ //appeler une API (joke get) avec le fecth
                    joke.textContent = response;
            });
       }

       getNewJoke();
       setInterval(getNewJoke,5000);
       

   </script>

</body>
</html>