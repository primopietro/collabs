<?php
	/****************************************    
	Fichier : notification_ep.php    
	Auteur : Boris Zoretic 
	Fonctionnalité : Classe mère permettant la création d'une 
					 notification pour un employé dans un projet et ses propriétés
	Date : 17 avril 2017
 
	Vérification :    
	Date               	Nom                   	Approuvé    
	========================================================= 
	23 avril 2017		Pietro Primo			OUI
	23 avril 2017		Maxime Proulx			OUI
	23 avril 2017		Boris Zoretic			OUI
 
 
	Historique de modifications :    
	Date               	Nom                   	Description    
	========================================================= 
	17 avril 2017		Boris Zoretic			Création de tous les fonctionnalitées
 
	****************************************/ 
	class NotificationEP {
		private $id_notification_ep;
		private $id_employe_projet;
		private $id_notification;
		
		function __construct(){
		   $this->id_notification_ep = 0;
		   $this->id_employe_projet = 0;
		   $this->id_notification = 0;
	   }
	   
	   /*
		* \pre: les paramètres id_nep, id_ep et id_n sont présents lors de l'appel
		* \post: l'objet notification_ep est créé
		*/
	   function init($id_nep, $id_ep, $id_n){
		   $this->id_notification_ep = $id_nep;
		   $this->id_employe_projet = $id_ep;
		   $this->id_notification = $id_n;
	   }
	   
	   /*
		* \pre: l'id de la notification pour un employé dans un projet est défini
		* \post: l'id de la notification pour un employé dans un projet est retournée
		*/
	   function getIdNotificationEP(){
		   return $this->id_notification_ep;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de la notification pour un employé dans un projet a été défini
		*/
	   function setIdNotificationEP($id){
		   $this->id_notification_ep = $id;
	   }
	   
	    /*
		* \pre: l'id de l'employé dans un projet est défini
		* \post: l'id de l'employé dans un projet est retournée
		*/
	   function getIdEmployeProjet(){
		   return $this->id_employe_projet;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de l'employé dans un projet a été défini
		*/
	   function setIdEmployeProjet($id){
		   $this->id_employe_projet = $id;
	   }
	   
	    /*
		* \pre: l'id de la notification est défini
		* \post: l'id de la notification est retournée
		*/
	   function getIdNotification(){
		   return $this->id_notification;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de la notification a été défini
		*/
	   function setIdNotification($id){
		   $this->id_notification = $id;
	   }
	   
	   /*
		* \pre: l'objet notification_ep est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
		function show() {
			echo "id_notification_ep: " . $this->id_notification_ep . "<br>";
			echo "Id_Employe_Projet: " . $this->id_employe_projet . "<br>";
			echo "id_notification: " . $this->id_notification . "<br>";
		}
	}
	
	/*$m = new NotificationEP();
	$m->init(1, 2, 3);
	$m->show();*/
?> 