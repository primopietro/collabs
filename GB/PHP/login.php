<?php
	session_start();
	require_once("controlleur/ConnectionBD.php");
	
	$result = $conn->query("SELECT * 
							FROM employe e JOIN classification_employe ce ON e.id_employe = ce.id_employe 
							WHERE ce.id_type_employe = 2  AND e.courriel = '" . htmlspecialchars($_POST["courriel"]) . "' 
							AND e.mot_passe = '" . htmlspecialchars($_POST["mot_passe"]) . "'");
	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$_SESSION["id_employe"] = $row["id_employe"];
			$_SESSION["nom"] = $row["nom"];			
			$_SESSION["prenom"] = $row["prenom"];
			$_SESSION["mot_passe"] = $row["mot_passe"];
			$_SESSION["LOG"] = true;
			header("Location: site/employes.php");
			exit();
		}
	} else {
		$_SESSION["message"] = "Pas defini";
		header("Location: site/index.php");
	}
?>