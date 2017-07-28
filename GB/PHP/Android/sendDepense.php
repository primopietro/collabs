<?php
	/****************************************    
	Fichier : getProjet.php    
	Auteur : Pietro Primo	   
	Fonctionnalité : Permet obtenir une liste avec tous les depenses 
	Date : 01 mai 2017
 
	Vérification :    
	Date               	Nom                   	Approuvé    
	========================================================= 
	07 mai 2017			Pietro Primo			OUI
 
 
	Historique de modifications :    
	Date               	Nom                   	Description    
	========================================================= 
 
	****************************************/ 

	require_once("../controlleur/ConnectionBD.php");

if(isSet($_GET["id_projet"]) && isSet($_GET["id_employe"]) && isSet($_GET["id_cda"]) && isSet($_GET["montant"])){
	
					$id_employe  = htmlspecialchars($_GET["id_employe"]);
					$id_projet  = htmlspecialchars($_GET["id_projet"]);
					$id_cda  = htmlspecialchars($_GET["id_cda"]);
					$montant  = htmlspecialchars($_GET["montant"]);
					
					//Get ID EP
					//Get id employe projet
					$result = $conn->query("SELECT id_employe_projet
					FROM employe_projet
					WHERE id_employe = ' " . $id_employe .  " ' AND id_projet =' " . $id_projet .  "'");
			
				
					$idEP =0;
					if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){											
							$idEP =  $row['id_employe_projet'];
						}
					}
					
						//Insert message dans message_ep
					
					$sql = "INSERT INTO `depense` 
				(`id_depense`, `id_employe_projet`, `id_image`, `id_categorie_da`, `montant`, `date_depense`) 				
				VALUES (NULL, '" . $idEP .  "', '1', '"  . $id_cda . "', '" . $montant .   "', NOW());";

				
				echo "$sql";
				if ($conn->query($sql) === TRUE) {
					echo "SUCCESS";
				}
				else{
					echo "NON";
				}
					
				
$conn->close();
}


?>