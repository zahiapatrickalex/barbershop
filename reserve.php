 <?php
	 if (isset($_POST['btn2'])) {
		$nom=$_POST['nom'];
		$tel=$_POST['tel'];
		$heure=$_POST['heure'];
		$type=$_POST['type'];
		$dated=$_POST['dated'];
		$nbpersonne=$_POST['nbpersonne'];
		$message=$_POST['message'];

		if ($nom && $tel && $heure && $type && $dated && $nbpersonne && $message) {
							   
				try { 
					// Connexion à la base de données
				    $db = new PDO("mysql:host=localhost;dbname=barbershop","root",""); 
				    $db-> setAttribute(PDO::ATTR_CASE, PDO:: CASE_LOWER); 
					$db-> setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);   

					// Insertion d’un enregistrement 
					$insert= $db -> prepare("INSERT INTO reservation (nomres, telres, heureres, type, dateres, nbpersonneres, messageres) VALUES ('$nom','$tel','$heure','$type','$dated','$nbpersonne','$message')"); 
					$insert -> execute();
					
					} catch (PDOException $e) { 
										die( "Erreur ! : " . $e->getMessage() ); 
										echo($e);
				} 

		}else{
				       echo "<h3>veuillez remplie tous les champs</h3>";} 
				        
	}

 ?> 