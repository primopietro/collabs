<?php
	/****************************************    
	Fichier : message_ep.php    
	Auteur : Boris Zoretic 
	Fonctionnalité : Classe mère permettant la création d'un 
					 message pour un employé dans un projet et ses propriétés
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
	class MessageEP {
		private $id_message_ep;
		private $id_employe_projet;
		private $id_message;
		
		function __construct(){
		   $this->id_message_ep = 0;
		   $this->id_employe_projet = 0;
		   $this->id_message = 0;
	   }
	   
	   /*
		* \pre: les paramètres id_mep, id_ep et id_m sont présents lors de l'appel
		* \post: l'objet etat_projet est créé
		*/
	   function init($id_mep, $id_ep, $id_m){
		   $this->id_message_ep = $id_mep;
		   $this->id_employe_projet = $id_ep;
		   $this->id_message = $id_m;
	   }
	   
	   /*
		* \pre: l'id du message pour un employé dans un projet est défini
		* \post: l'id du message pour un employé dans un projet est retournée
		*/
	   function getIdMessageEP(){
		   return $this->id_message_ep;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id du message pour un employé dans un projet a été défini
		*/
	   function setIdMessageEP($id){
		   $this->id_message_ep = $id;
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
		* \pre: l'id du message est défini
		* \post: l'id du message est retournée
		*/
	   function getIdMessage(){
		   return $this->id_message;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id du message a été défini
		*/
	   function setIdMessage($id){
		   $this->id_message = $id;
	   }
	   
	   /*
		* \pre: l'objet message_ep est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
		function show() {
			echo "Id_Message_EP: " . $this->id_message_ep . "<br>";
			echo "Id_Employe_Projet: " . $this->id_employe_projet . "<br>";
			echo "Id_Message: " . $this->id_message . "<br>";
		}
	}
	
	//TEST
	/*$m = new MessageEP();
	$m->init(1, 2, 3);
	$m->show();*/
?> 