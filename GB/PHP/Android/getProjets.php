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

			function getJson($id_employe){
			global $conn;
			$result = $conn->query("SELECT p.id_projet, p.id_etat_projet, p.nom, p.date_debut ,p.date_fin ,p.montant_alloue,p.montant_utilise
									FROM projet p
									JOIN employe_projet ep ON ep.id_projet = p.id_projet
									JOIN employe e on e.id_employe = ep.id_employe
									WHERE e.id_employe = " . $id_employe. " AND p.id_etat_projet = 1");
									
			
			echo "{ \"listeProjets\": [";
			$compteur =0;
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
										
					echo "{";
								
					echo "\"id_projet\" : \"" . $row['id_projet'] . "\",";
					
					echo "\"id_etat_projet\" : \"" .$row['id_etat_projet'] . "\",";
					
					echo "\"nom\" : \"" .$row['nom'] . "\",";					
					
					echo "\"date_debut\" : \"" . $row['date_debut'] . "\",";		
					
					echo "\"date_fin\" : \"" . $row['date_fin'] . "\",";							
				
					echo "\"montant_alloue\" : \"" . $row['montant_alloue']. "\",";
					
					echo "\"montant_utilise\" : \"" .$row['montant_utilise']. "\"";
					
					echo "}";

					$compteur++;
					if($compteur < ($result->num_rows +1)){
						echo ",";
					}
					++$compteur;
				}
			}
			
			echo "]} ";
		}

		getJson($_GET["id_employe"]);
		
?>