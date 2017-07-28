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


if(isSet($_GET["id_projet"]) && isSet($_GET["id_employe"]) && isSet($_GET["objet"]) && isSet($_GET["message"])){
				$id_projet = htmlspecialchars($_GET['id_projet']);
				$id_employe = htmlspecialchars($_GET['id_employe']);
				$objet = htmlspecialchars($_GET['objet']);
				$message = htmlspecialchars($_GET['message']);
				
				$sql = "INSERT INTO `message` 
				(`id_message`, `id_etat_message`, `objet`, `texte_message`, `moment_envoye`, `reponse`, `moment_reponse`)
				VALUES (NULL, '1', '" . $objet .  "', '" . $message .  "', NOW(), '', NULL)";

				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
					//Get id message
					$idMessage = 0;
					
					$result = $conn->query("SELECT MAX(id_message) AS id_message FROM message");
			
				
					$compteur =0;
					if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){											
							$idMessage =  $row['id_message'];
						}
					}
					
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
					$sql = "INSERT INTO message_ep 
				(id_message_ep, id_employe_projet, id_message) 
				VALUES (NULL, '" . $idEP . "', ' " . $idMessage  . "')";

				if ($conn->query($sql) === TRUE) {
					echo "SUCCESS";
				}
				
				
					
					
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
				
								
				
$conn->close();
}


?>