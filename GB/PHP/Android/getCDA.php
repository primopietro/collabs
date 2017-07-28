<?php
	/****************************************    
	Fichier : getProjets.php    
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

			function getJson($id_projet,$id_employe){
			global $conn;

									
			$result = $conn->query("SELECT cd.nom as nom, cda.id_categorie_da as id_cda
									FROM categorie_depense_alloue cda
									JOIN employe_projet ep ON cda.id_employe_projet = ep.id_employe_projet
									JOIN categorie_depense cd ON cd.id_categorie_depense = cda.id_categorie_depense
									WHERE ep.id_employe =  " . $id_employe .  "  AND ep.id_projet = " . $id_projet .  "");
			
			echo "{ \"cda\": [";

			
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
										
					echo "{";
							
					echo "\" " . $row["nom"]  .  "\" : \"" . $row['id_cda']. "\"";
					
													
					echo "},";
			
				}
			}
			
			echo "]} ";
		}

		getJson($_GET["id_projet"],$_GET["id_employe"]);
		
?>