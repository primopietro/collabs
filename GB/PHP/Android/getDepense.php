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

			function getJson($order,$id_employe){
			global $conn;

									
			$result = $conn->query("

SELECT d.montant as montant, d.id_depense as id, e.nom as nom, e.prenom as prenom, d.date_depense as date , cd.nom as categorieDepense, p.nom as nomProjet
FROM depense d 
JOIN employe_projet ep ON ep.id_employe_projet = d.id_employe_projet 
JOIN employe e ON e.id_employe = ep.id_employe
JOIN categorie_depense_alloue cda ON cda.id_categorie_da = d.id_categorie_da
JOIN categorie_depense cd ON cd.id_categorie_depense = cda.id_categorie_depense
JOIN projet p ON p.id_projet = ep.id_projet
WHERE e.id_employe = '" . $id_employe . "' ORDER BY ".$order);
			
			echo "{ \"listeDepense\": [";
			$compteur =0;
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
										
					echo "{";
							
					echo "\"projet\" : \"" . $row['nomProjet']. "\",";
					
					echo "\"montant\" : \"" . $row['montant']. "\",";
					
					echo "\"categorie\" : \"" . $row['categorieDepense']. "\",";
					
					echo "\"date\" : \"" . $row['date']. "\"";
					
					
					echo "}";

					$compteur++;
					if($compteur < ($result->num_rows +1)){
						echo ",";
					}
				
				}
			}
			
			echo "]} ";
		}

		getJson($_GET["order"],$_GET["id_employe"]);
		
?>