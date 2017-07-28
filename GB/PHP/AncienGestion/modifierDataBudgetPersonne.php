<?php
	session_start();
	require_once("controlleur/ConnectionBD.php");
	

	
	$montant = htmlspecialchars($_POST['montant_employeProjet']);
	$idProjet = htmlspecialchars($_POST['idProjet']);
	$idEmploye = htmlspecialchars($_POST['idEmploye']);
	
	if($montant >=0){
		$sql = "UPDATE `employe_projet` SET `total_alloue` = $montant WHERE id_employe = $idEmploye AND id_projet = $idProjet ";
	
	if ($conn->query($sql) === TRUE) {
		echo "New record updated successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}
	
	header("Location: /gb/php/site/projetPersonne.php?idEmploye=$idEmploye&idProjet=$idProjet");
	
	
	$conn->close();
?>