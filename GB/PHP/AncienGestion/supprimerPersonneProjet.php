<?php
	session_start();
	require_once("controlleur/ConnectionBD.php");
	
	$sql = "DELETE FROM `employe_projet`
	WHERE `employe_projet`.`id_employe` = ". $_GET["idEmploye"] . "
	AND  `employe_projet`.`id_projet` = ". $_GET["idProjet"] . "";
	
	if ($conn->query($sql) === TRUE) {
		echo "New record updated successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$idProjet = ((( $_SESSION["idProjet"]) + 1) * 666 ) - 666;
	header("Location: /gb/php/site/projet.php?idProjet=$idProjet");
	
?>