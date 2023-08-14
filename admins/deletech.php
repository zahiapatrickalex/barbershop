<?php 

//supprimer la photo
//recuperer l'ID dans le lien avec la methode GET
$id = $_GET['id'];
//inclure la page connexion
include_once"con_bdd.php";
//suprimer la photo qui a pour id $id

$req=mysqli_query($con,"DELETE FROM coiffeur WHERE idcoiffeur ='$id'");

    //redirection vers la page liste.php
    header("location:liste.php");



 ?>