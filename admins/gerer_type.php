<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="vue.css">
	<link rel="stylesheet" href="fontawesome.css"> 

</head>

<body>
<h1 style="color:greenyellow;text-decoration:none;">GERER LES TYPES DE CHAMBRES </h1><br><br>

<main>
	<h1>Ajouter un type de chambre </h1>
	<form method="POST">
		<?php
	 if (isset($_POST['btnAj'])) {

		$nomtype=$_POST['nomtype'];
		
		if ($nomtype ) {					   
				try { 
					// Connexion à la base de données
				    $db = new PDO("mysql:host=localhost;dbname=barbershop","root",""); 
				    $db-> setAttribute(PDO::ATTR_CASE, PDO:: CASE_LOWER); 
					$db-> setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);   

					// Insertion d’un enregistrement 
					$insert= $db -> prepare("INSERT INTO type (libel) VALUES ('$nomtype')"); 
					$insert -> execute();
					echo "<h3>type chambre ajouté</h3> ";
					


					} catch (PDOException $e) { 
										die( "Erreur ! : " . $e->getMessage() ); 
										echo($e);
				} 
		}else{
				       echo "<h3>veuillez remplie tous les champs</h3>";} 
				        
	}

 ?> 
		<input type="text" name="nomtype" placeholder="Entrez type de chambre">
		<button name="btnAj">Ajouter</button>
	</form>
</main>
	
	

	<br><br>
	<main>
		<h1>Liste des types de chambre </h1>

		<table>
			<tr>
				<th>libellé</th>
		       <th>gerer</th>
		   </tr>
		<?php  
		try { 
					// Connexion à la base de données
				    $db = new PDO("mysql:host=localhost;dbname=barbershop","root",""); 
				    $db-> setAttribute(PDO::ATTR_CASE, PDO:: CASE_LOWER); 
					$db-> setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
				
					// Lecture d’enregistrements
					$select= $db -> query("SELECT * FROM type");
					while ($s = $select -> fetch(PDO:: FETCH_OBJ)) {?>
					<tr><td><?php echo $s-> libel; ?> </td>
				    <td><a style="text-decoration: none; font-size:15px; font-family:arial;" href="supprimer.php? id=<?php echo $s->idtype ?>">supprimer</a></td> 
				</tr>

					
					
					<?php 
					}


					} catch (PDOException $e) { 
										die( "Erreur ! : " . $e->getMessage() ); 
										echo($e);
				} 

			?>
			</table>
	</main>

	

</body>
</html>