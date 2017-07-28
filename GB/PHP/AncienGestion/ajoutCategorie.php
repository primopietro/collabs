<?php
	session_start();
	require_once("controlleur/ConnectionBD.php");
	
	$nom = htmlspecialchars($_POST['Nom']);
	$desc=htmlspecialchars($_POST['Description']);
	
	$sql = "INSERT INTO categorie_depense (id_categorie_depense, nom, description) 
	values (NULL, '$nom', '$desc')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	
	header("Location: /gb/php/site/projetPersonne.php?idEmploye=" . $_SESSION['pp_id_employe'] . "&idProjet=" . $_SESSION['pp_id_projet']);
?>