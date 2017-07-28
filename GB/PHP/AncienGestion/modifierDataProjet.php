<?php
	session_start();
	require_once("controlleur/ConnectionBD.php");
	
	$idModifierProjet = ((( $_SESSION["idProjet"]) + 1) * 666 ) - 666;
	
	$nom = htmlspecialchars($_POST['nom']);
	$date_debut = htmlspecialchars($_POST['date_debut']);
	$date_fin = htmlspecialchars($_POST['date_fin']);
	$montant = htmlspecialchars($_POST['montant_alloue']);
	
	if($nom == "" || $nom == " "){
		$nom = $_SESSION["p_nom"];
	}
	if($date_debut == "" || $date_debut == " "){
		$prenom = $_SESSION["p_date_debut"];
	}
	if($date_fin == "" || $date_fin == " "){
		$courriel = $_SESSION["p_date_fin"];
	}
	if($montant == "" || $montant == " "){
		$tel = $_SESSION["p_montant_alloue"];
	}
	
	$sql = "UPDATE `projet`
	SET 
	`nom` = '" . $nom . "', 
	`date_debut` = '" . $date_debut . "',
	`date_fin` = '" . $date_fin . "', 
	`montant_alloue` = '" .$montant . "'
	WHERE `id_projet` = '" . $_SESSION["idProjet"] . "' ";
 
	if ($conn->query($sql) === TRUE) {
		echo "New record updated successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	header("Location: /gb/php/site/projets.php");
	
	
	$conn->close();
?>