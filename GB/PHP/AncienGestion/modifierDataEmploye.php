<?php
	session_start();
	require_once("controlleur/ConnectionBD.php");
	
	$idEmployeSession = ((( $_SESSION["idModifieEmp"]) + 1) * 666 ) - 666;
	
	$nom = htmlspecialchars($_POST['Nom']);
	$prenom = htmlspecialchars($_POST['Prenom']);
	$courriel = htmlspecialchars($_POST['Courriel']);
	$tel = htmlspecialchars($_POST['Telephone']);
	$motPasse = htmlspecialchars($_POST['MotPasse']);
	
	if($nom == "" || $nom == " "){
		$nom = $_SESSION["m_e_nom"];
	}
	if($prenom == "" || $prenom == " "){
		$prenom = $_SESSION["m_e_prenom"];
	}
	if($courriel == "" || $courriel == " "){
		$courriel = $_SESSION["m_e_courriel"];
	}
	if($tel == "" || $tel == " "){
		$tel = $_SESSION["m_e_telephone"];
	}
	if($motPasse == "" || $motPasse == " "){
		$motPasse = $_SESSION["m_e_motPasse"];
	}
	
	$sql = "UPDATE `employe`
	SET 
	`nom` = '" . $nom . "', 
	`prenom` = '" . $prenom . "',
	`courriel` = '" . $courriel . "', 
	`mot_passe` = '" .$motPasse . "', 
	`telephone` = '" . $tel . "'
	WHERE `employe`.`id_employe` = '" . $_SESSION["idModifieEmp"] . "' ";
 
	if ($conn->query($sql) === TRUE) {
		echo "New record updated successfully";
		if($_SESSION["id_employe"] == $_SESSION["idModifieEmp"]){
			
			$_SESSION["nom"] = $nom;			
			$_SESSION["prenom"] = $prenom;
		}
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	header("Location: /gb/php/site/employes.php");
	
	
	
	$conn->close();
?>