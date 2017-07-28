<?php
	session_start();
	require_once("controlleur/ConnectionBD.php");
	
	$nom = htmlspecialchars($_POST['Nom']);
	$dateDebut = htmlspecialchars($_POST['DateDebut']);
	$dateFin = htmlspecialchars($_POST['DateFin']);
	$budget = htmlspecialchars($_POST['Budget']);
	
	
	$sql = "INSERT INTO projet (id_projet, id_etat_projet, nom, date_debut, date_fin, montant_alloue, montant_utilise) 
	values (NULL, '1', '$nom', '$dateDebut', '$dateFin' , '$budget', '0')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}


	

	$conn->close();
	$_SESSION["c_a_emp"] = true;
?>