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
			$result = $conn->query("SELECT p.nom as nomProjet, e.nom as nomEmploye, e.prenom as prenomEmploye,p.id_projet as idProject, e.id_employe as idEmploye, m.* 
										FROM message_ep me
										JOIN message m ON me.id_message = m.id_message 
										JOIN employe_projet ep ON me.id_employe_projet = ep.id_employe_projet
										JOIN employe e ON e.id_employe = ep.id_employe
										JOIN projet p ON p.id_projet = ep.id_projet
										WHERE e.id_employe = " . $id_employe);
									
			
			echo "{ \"listeMessages\": [";
			$compteur =0;
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
										
					echo "{";
							
					echo "\"momentEvoyer\" : \"" . $row['moment_envoye']. "\",";
					
					echo "\"momentReponse\" : \"" . $row['moment_reponse']. "\",";
					
					echo "\"objet\" : \"" . $row['objet']. "\",";
					
					
					echo "\"idEtat\" : \"" . $row['id_etat_message']. "\",";
					
					echo "\"nomProjet\" : \"" . $row['nomProjet']. "\",";
					
					echo "\"id_employe\" : \"" . $row['idEmploye']. "\",";
					
					echo "\"nomEmploye\" : \"" . $row['nomEmploye']. "\",";
					
					echo "\"prenomEmploye\" : \"" . $row['prenomEmploye']. "\",";
					
					echo "\"message\" : \"" . $row['texte_message']. "\",";
					
					echo "\"reponse\" : \"" . $row['reponse']. "\"";
					
					
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