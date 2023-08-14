<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet"> -->

   <title>Espace de connexion Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" type="text/css" href="design.css">
<!-- 

TemplateMo 551 Stand Blog

https://templatemo.com/tm-551-stand-blog

-->
  </head>

  <body>
  <?php
      session_start();
 ?>

  <section>
    <center><h2>connexion - Administrateur</h2></center><br>
    
      <form method="POST" action="" align="center">
        

    <?php
        if (isset($_POST['valider'])) {
            if (!empty($_POST['pseudo']) AND !empty($_POST['mdp'])) {
              $pseudo_par_defaut="admin";
              $mdp_par_defaut="admin1234";

              $pseudo_saisi=htmlspecialchars($_POST['pseudo']);
              $mdp_saisi=htmlspecialchars($_POST['mdp']);

                  if ($pseudo_saisi==$pseudo_par_defaut AND $mdp_saisi==$mdp_par_defaut) {
                    $_SESSION['mdp'] = $mdp_saisi;
                    header('Location:adminbarber_shop.php');
                  
                  }else{
                    echo "votre mot de passe ou pseudo est incorrect!";
                  }
            }else{
              echo "veuillez completer tout les champs...";
            }
        }
     ?>
        <input type="text" name="pseudo" autocomplete="off">
        <br>
        <input type="password" name="mdp">
        <br><br>
        <input type="submit" name="valider" value="se connecter">
      </form>
  </section>

  </body>
</html>