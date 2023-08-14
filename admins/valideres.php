<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="vue.css">
	<link rel="stylesheet" href="../assets/css/fontawesome.css"> 

</head>

<body>

<main style="width:90%; min-height:100px;">
	<h1>Les reservations en cours </h1>
</main>
	
	

	<br><br>
	<main style="width:80%;">
		<h1>Liste des types de chambre </h1>

		<table>
			<tr>
				<th>Nom</th>
				<th>Contact</th>
				<th>Heure</th>
				<th>Lieu</th>
				<th>Date</th>
		        <th>Nombre de personne</th>
		        <th>Message</th>
				
		   </tr>
<?php  
      

		try { 
					// Connexion à la base de données
				    $db = new PDO("mysql:host=localhost;dbname=barbershop","root",""); 
				    $db-> setAttribute(PDO::ATTR_CASE, PDO:: CASE_LOWER); 
					$db-> setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
				
					// Lecture d’enregistrements
					if(isset($_GET['valider'])){
	                   $idreservation=$_GET['valider'];
					$select= $db -> query("SELECT * FROM reservation WHERE idreservation='$id'");
					 while ($s = $select -> fetch(PDO:: FETCH_OBJ)) {
					 	$select->execute();
					header('location:valideres.php');?>
					
					<tr><td><?php echo $s-> nomres; ?> </td>
						<td><?php echo $s-> telres; ?> </td>
						<td><?php echo $s-> heureres; ?> </td>
						<td><?php echo $s-> type; ?> </td>
						<td><?php echo $s-> dateres; ?> </td>
						<td><?php echo $s-> nbpersonneres; ?> </td>
						<td><?php echo $s-> messageres; ?> </td>
				</tr>
				<?php 
					}
					

					
					} catch (PDOException $e) { 
										die( "Erreur ! : " . $e->getMessage() ); 
										echo($e);
				} 

			?>