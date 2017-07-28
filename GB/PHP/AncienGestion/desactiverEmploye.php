<?php
	session_start();
	require_once("controlleur/ConnectionBD.php");
	
	
	if($_SESSION["m_e_etat"] == 1){	
		$sql = "UPDATE `employe`
		SET `id_etat_employe` = '2'
		WHERE `employe`.`id_employe` = '" . $_SESSION["idModifieEmp"] . "' ";
	}
	else{
		$sql = "UPDATE `employe`
		SET `id_etat_employe` = '1'
		WHERE `employe`.`id_employe` = '" . $_SESSION["idModifieEmp"] . "' ";
	}
	
 
	if ($conn->query($sql) === TRUE) {
		echo "New record updated successfully";

	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	header("Location: /gb/php/site/employes.php");
	
	
	
	$conn->close();
?>