<?php
	/****************************************    
	Fichier : GestionNotification.php    
	Auteur : Maxime Proulx  
	Fonctionnalité : Permet la gestion des notifications que l'administrateur
					 envoit aux employées dans un projet spécifique (envoie notification)
	Date : 23 avril 2017
 
	Vérification :    
	Date               	Nom                   	Approuvé    
	========================================================= 
	23 avril 2017		Pietro Primo			OUI
	23 avril 2017		Maxime Proulx			OUI
	23 avril 2017		Boris Zoretic			OUI
 
 
	Historique de modifications :    
	Date               	Nom                   	Description    
	========================================================= 
	23 avril 2017		Maxime Proulx			Création de tous les fonctionnalitées avec les fonctions
	27 avril 2017		Boris Zoretic			Modification minime en raison de l'ajout des vérification de formulaire
 
	****************************************/ 
	if(!isSet($_SESSION)){
		session_start();
	}
	
	require_once("../controlleur/ConnectionBD.php");
	require_once("../classeMere/notification.php");
	
	class GestionNotification {
		private $notification;
		
		function __construct(){
			$this->notification = NULL;
		}
		
		/*
		* \pre: les valeurs d'id de projet et de notification sont remplises
		* \post: l'ajout est éxécuté dans la base de données
		*/
		function envoyerNotification(){
			if($_POST['Texte'] != ""){
				global $conn;
				$notification = new Notification();
				$notification->init(null,$_POST['Texte']);
				$idProjet=($_POST['IdProjet']);
				
				$sql =  "INSERT INTO notification (id_notification, texte) 
					values (NULL,'" . $notification->getTexte() . "')";
						

				 if ($conn->query($sql) === TRUE) {
					 echo "New record created successfully";
				 } else {
					 echo "Error: " . $sql . "<br>" . $conn->error;
				 }
				 
				$result = $conn->query("SELECT * FROM notification_ep ");
				while($row = $result->fetch_assoc())
				{
						$idNotification=$row['id_notification'];
						$idNotification=$idNotification+1;
		
				}
				$result = $conn->query("SELECT * FROM employe_projet WHERE id_projet = '$idProjet'");
				while($row = $result->fetch_assoc())
				{

					$id_emp=$row['id_employe'];
					$insert = ("INSERT INTO notification_ep (id_notification_ep, id_employe_projet,id_notification) 
					values (NULL,'" . $id_emp . "','" . $idNotification. "')");
					echo "$insert";
					 if ($conn->query($insert) === TRUE) {
						 echo "New record created successfully";
					 } else {
						 echo "Error: " . $insert . "<br>" . $conn->error;
					 }
				 }
				
				 
				$conn->close();
			}
		}
		
	}
	$gestionNotification = new GestionNotification();
	$gestionNotification->envoyerNotification();
?>