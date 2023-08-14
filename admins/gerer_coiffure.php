<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet"> -->

    <title>Stand CSS Blog by TemplateMo</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" type="text/css" href="style.css">

<!--

TemplateMo 551 Stand Blog

https://templatemo.com/tm-551-stand-blog

-->
  </head>

  <body> 
    
      <?php 
        //inclure la page de connexion
        include_once"con_bdd.php";
            
        //verifier que les données sont envoyés
        if (isset($_POST['envoyer'])){
              //verifier que l'image et le texte on été choisie

              if (!empty($_FILES['image']) 
                && isset($_POST['nomcoiffure']) && $_POST['nomcoiffure']!=""
                && isset($_POST['prixcoiffure']) && $_POST['prixcoiffure']=""){

                    //on recupere d'abord le nom de l'image 
                    $img_nom=$_FILES['image']['name'];

                    //nous deffinisons un nom temporaire
                    $tmp_nom=$_FILES['image']['tmp_name'];


                    //on recupere d'abord l'heuure actuelle 

                    $time= time();

                    //on renomme l'image 
                    $nouveau_nom_img=$time.$img_nom;

                    //on place l'image dans dossier appeller "image_bdd"
                    $deplacer_img= move_uploaded_file($tmp_nom,"images_bdd1/".$nouveau_nom_img);
                    if ($deplacer_img) {
                        //si l'image a ete dans le dossier
                        //inserons un texte et le nom de l'image dans la base de donnees
                        $nomcoiffure = $_POST['nomcoiffure'];
                        $prixcoiffure = $_POST['prixcoiffure'];
                        $req =  mysqli_query($con ,  "INSERT INTO coiffure VALUES(NULL ,'$nomcoiffure','$prixcoiffure','$nouveau_nom_img')"); 
                        //verifier que la requette fonctionne

                        if ($req) {
                          //si oui , faire une redirection sur la page liste.php

                          header("location:gerer_coiffure.php");

                        }else{
                          //si non 
                          $message="echec de l'ajout de l'image!";
                        }
                    }else{
                      //si non 

                      $message= "veuillez choisie une image de taille inferieur a 1Mo!";
                    }
              }else{
                //si les champs sont vide afficher un message
                $message="veuillez remplie tous les champs!";
              }
        }


      ?>

  <a href="liste.php" class="link">LISTE DES COIFFEUR</a>
  <p class="error">
    <?php
    //afficher une erreur si la variable message existe
    if (isset($message)) echo $message;
     ?>
  </p>
  <form method="POST" action="" enctype="multipart/form-data">

    <label for="nom">nom du coiffure </label>
    <input type="text" id="nom" name="nomcoifure"><br><br>

    
    <label for="prix">prix coiffure</label>
    <input type="text" id="prix" name="prixcoiffure "><br><br>
    
    <input type="file" name="image"><br><br>

    <input type="submit" value="ajouter" name="envoyer">
    
    
  </form>


  
  </body>
</html>