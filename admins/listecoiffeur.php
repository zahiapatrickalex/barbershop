<!DOCTYPE html>
<html>
<head>
    <title>listes des chambres</title>
   

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;500&display=swap" rel="stylesheet">

        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <link href="../css/bootstrap-icons.css" rel="stylesheet">

        <link href="../css/templatemo-barber-shop.css" rel="stylesheet">

</head>
<body>
    <a href="gerer_coiffeur.php" class="link" style="margin-top:40px; margin-bottom:-40px;">AJOUTER UNE CHAMBRE</a>
   <section class="about-section section-padding" id="section_2">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-12 col-12 mx-auto">
                                    <h2 class="mb-4">Mes meilleurs coiffeurs</h2>

                                    <div class="border-bottom pb-3 mb-5">
                                        <p>Gentlemen's Barber Shop is new Bootstrap v5 HTML CSS template by <a href="https://templatemo.com/page/1" target="_blank">TemplateMo</a> for everyone. There is a sidebar menu to navigate the one-page layout. You can feel free to adapt this template for your business.</p>
                                    </div>
                                </div>

                                    <h6 class="mb-5">Rencontrer des coiffeurs</h6>
        
                                    <?php 
                                        //inclure la page connexion
                                        include_once"con_bdd.php";
                                        //afficher la liste des photos qui sont dans la base de donnees

                                        $req= mysqli_query($con ,"SELECT* FROM coiffeur");

                                        //verifier que la liste n'est pas vide

                                        if (mysqli_num_rows($req)<1) {
                                            ?>
                                            <p class="vide_message">la liste des photos est vide</p>
                                            <?php 
                                        }
                                        //afficher la liste des photos
                                        while ($row = mysqli_fetch_assoc($req)) {
                                     ?>
            
                     <div class="col-lg-12 col-1 custom-block-bg-overlay-wrap me-lg-5 mb-5 mb-lg-5">
                                            
                                            <img  src="images_bdd/<?=$row['img']?>" class="custom-block-bg-overlay-image img-fluid" alt="">


                                            <div class="team-info d-flex align-items-center flex-wrap">
                                                <p style=""><?=$row['nomcoiffeur']?></p>

                                                <ul class="social-icon ms-auto">

                                                    <li class="social-icon-item">
                                                        <a href="https://wa.me/<?=$row['telcoiffeur']?>"  class="social-icon-link bi-whatsapp">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a class="delete_btn" href="deletech.php?id=<?=$row['idcoiffeur']?>">supprimer</a> 
                                        </div>
                                      <?php 
                                          }
                                         ?>
        
   
                            </div>
                        </div>
                    </section>
   







</body>
</html>