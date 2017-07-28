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
			$result = $conn->query("SELECT n.id_notification,e.id_employe, e.nom as nomEmploye, e.prenom as prenomEmploye, p.id_projet, p.nom as nomProjet
										FROM notification n
										JOIN notification_ep np ON np.id_notification_ep = n.id_notification
										JOIN employe_projet ep on ep.id_employe_projet = np.id_employe_projet
										JOIN employe e on e.id_employe = e.id_employe
										JOIN projet p on p.id_projet=ep.id_projet
										WHERE e.id_employe = " . $id_employe. " AND p.id_etat_projet = 1");
									
			
			echo "{ \"listeNotification\": [";
			$compteur =0;
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
										
					echo "{";
								
					echo "\"id_notification\" : \"" . $row['id_notification'] . "\",";
					
					echo "\"id_employe\" : \"" .$row['id_employe'] . "\",";
					
					echo "\"nom\" : \"" .$row['nomEmploye'] . "\",";					
					
					echo "\"prenom\" : \"" . $row['prenomEmploye'] . "\",";		
					
					echo "\"id_projet\" : \"" . $row['id_projet'] . "\",";							
				
					echo "\"nomProjet\" : \"" . $row['nomProjet']. "\"";
					
					
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