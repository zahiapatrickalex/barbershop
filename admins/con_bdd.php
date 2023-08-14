<?php 
//on établie la connexion a la base de données

$con = mysqli_connect("localhost", "root", "","barbershop");

//on verifie la connexion
if (!$con) {
	die('Erreur:'.mysql_connect_error());
}
  
 ?>