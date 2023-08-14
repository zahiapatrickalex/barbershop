<?php  
       $id=$_GET['id'];

		try { 
					// Connexion à la base de données
				    $db = new PDO("mysql:host=localhost;dbname=barbershop","root",""); 
				    $db-> setAttribute(PDO::ATTR_CASE, PDO:: CASE_LOWER); 
					$db-> setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
				
					// Lecture d’enregistrements
					$select= $db -> query("DELETE  FROM reservation WHERE idreservation='$id' ");
					// while ($s = $select -> fetch(PDO:: FETCH_OBJ)) {
					$select->execute();
					header('location:gerer_reservation.php');

					
					} catch (PDOException $e) { 
										die( "Erreur ! : " . $e->getMessage() ); 
										echo($e);
				} 

			?>