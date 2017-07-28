<?php
	/****************************************    
	Fichier : GestionMessage.php    
	Auteur : Maxime Proulx  
	Fonctionnalité : Permet la gestion des messages(requêtes)
					 des employés (accepter/refuser une requête avec l'option de laisser un message)
	Date : 18 avril 2017
 
	Vérification :    
	Date               	Nom                   	Approuvé    
	========================================================= 
	23 avril 2017		Pietro Primo			OUI
	23 avril 2017		Maxime Proulx			OUI
	23 avril 2017		Boris Zoretic			OUI
 
 
	Historique de modifications :    
	Date               	Nom                   	Description    
	========================================================= 
	18 avril 2017		Maxime Proulx			Création de tous les fonctionnalitées
	20 avril 2017		Boris Zoretic			Amélioration des fonctionnalitées et création des fonctions
 
	****************************************/ 
	if(!isSet($_SESSION)){
		session_start();
	}
	
	require_once("../controlleur/ConnectionBD.php");
	require_once("../classeMere/message.php");
	
	class GestionMessage {
		private $listeMessage;
		
		function __construct(){
			$this->listeMessage = [];
		}
		
		/*
		* \pre: la liste à été construite avec succès
		* \post: la liste à été remplie grâce à la requête
		*/
		function init(){
			global $conn;
			$result = $conn->query("SELECT * FROM message");
			
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$m = new Message();
					$m->init($row['id_message'], $row['id_etat_message'], $row['objet'], $row['texte_message'], $row['moment_envoye'], $row['reponse'], $row['moment_reponse']);
					
					$this->listeMessage[$row['id_message']] = $m;
					//$this->listeMessage[$row['id_message']]->show();
				}
			}
		}
		
		/*
		* \pre: les valeurs d'id, du message et de l'état, et de reponse sont remplises
		* \post: la modification du message est éxécuté dans la base de données
		*/
		function repondreMessage(){
			global $conn;
			$id=$_POST['id_message'];
			$etat = $_POST['etat'];
			$reponse = $_POST['Reponse'];
			
			//set la dat au bon timezone
			date_default_timezone_set('America/Montreal');
			$date =date('Y/m/d H:i:s ');
			echo"$id"."<br>";
			echo"$date";
			
			//requete sql qui modifi la date de reponse et le statut de la notification
			$sql = "UPDATE message 
					SET id_etat_message='$etat', moment_reponse='$date', reponse = '$reponse' 
					WHERE id_message='$id'";
					
			//affiche une confirmation ou une erreur par rapport a la requete sql
			 if ($conn->query($sql) === TRUE) {
				 echo "New record created successfully";
			 } else {
				 echo "Error: " . $sql . "<br>" . $conn->error;
			 }
			$conn->close();
			header("Location: /gb/php/site/messages.php");
		}
		
		/*
		* \pre: le paramètre est un message
		* \post: le message est ajouté à la liste
		*/
		function addToArray($m){
			array_push($this->listeCategorie, $m);
		}
	}
	
	$gestionMessage = new GestionMessage();
	$gestionMessage->init();
	
	if(isSet($_POST["etat"])){
		$message = new Message();
		
		$result = $conn->query("SELECT * 
								FROM message
								WHERE id_message =" . $_POST["id_message"]);
		$row = $result->fetch_assoc();				
		$message->init($row['id_message'], $_POST['etat'], $row['objet'], $row['texte_message'], $row['moment_envoye'], $_POST['Reponse'], $message->setDateReponse());
		$gestionMessage->addToArray($message);
		
		
		$gestionMessage->repondreMessage();
	}
?>