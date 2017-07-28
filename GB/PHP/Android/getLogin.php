<?php
	/****************************************    
	Fichier : getProjet.php    
	Auteur : Pietro Primo	   
	Fonctionnalité : Permet obtenir une liste avec tous les depenses 
	Date : 01 mai 2017
 
	Vérification :    
	Date               	Nom                   	Approuvé    
	========================================================= 
	02 mai 2017			Pietro Primo			OUI
 
 
	Historique de modifications :    
	Date               	Nom                   	Description    
	========================================================= 
 
	****************************************/ 

	require_once("../controlleur/ConnectionBD.php");

	function getJson($courriel, $passe){
		
	
		global $conn;
		$result = $conn->query("SELECT *
								FROM employe
								WHERE courriel = '" . $courriel . "' AND mot_passe = '" . $passe . "' AND id_etat_employe = 1");
		echo "{ \"login\": [{";
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo " \"id\" :  " . "\"" .  $row["id_employe"] . "\",";
				echo " \"nom\" :  " . "\"" .  $row["nom"] . "\",";
				echo " \"prenom\" :  " . "\"" .  $row["prenom"] . "\",";
				echo " \"courriel\" :  " . "\"" .  $row["courriel"] . "\",";
				echo " \"motpasse\" :  " . "\"" .  $row["mot_passe"] . "\",";
				echo " \"tel\" :  " . "\"" .  $row["telephone"] . "\",";
				echo " \"idEtat\" :  " . "\"" .  $row["id_etat_employe"] . "\"";
			}
		}
		else{
			echo " \"id\" :  " . "\"0\"";
		}
		echo "}]}";
		
		
		

		
	}
if(isSet($_GET["courriel"]) || isSet($_GET["motPasse"])){
		getJson(htmlspecialchars($_GET["courriel"]), htmlspecialchars($_GET["motPasse"]));
}
else{
	echo "{ \"login\": [{ \"id\" : \"3\"}]}";
}


?>