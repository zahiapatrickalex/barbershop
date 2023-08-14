<?php
    try { 
					// Connexion à la base de données
				    $db = new PDO("mysql:host=localhost;dbname=barbershop","root",""); 
				    $db-> setAttribute(PDO::ATTR_CASE, PDO:: CASE_LOWER); 
					$db-> setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
				
					// Lecture d’enregistrements
					$select= $db -> query("SELECT * FROM type");
					while ($s = $select -> fetch(PDO:: FETCH_OBJ)) {
						
?>
					<option><?php echo $s-> libel; ?> </option>
					

					
					
<?php 
					}


					} catch (PDOException $e) { 
										die( "Erreur ! : " . $e->getMessage() ); 
										echo($e);
                } 
?>