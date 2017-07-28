<?php
	/****************************************    
	Fichier : Notification.php    
	Auteur : Maxime Proulx 
	Fonctionnalité : Classe mère permettant la création d'une 
					 notification et ses propriétés
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
	17 avril 2017		Maxime Proulx			Création de tous les fonctionnalitées
 
	****************************************/ 
	class Notification {

	   private  $id_notification;
	   private  $texte_notification;

	   function __construct() 
	   {
			$this->id_notification="";
			$this->texte_notification="";
	   }
	   
	   /*
		* \pre: les paramètres id_notification et texte_notification sont présents lors de l'appel
		* \post: l'objet notification est créé
		*/
		function init($id_notification,$texte_notification) 
	   {
			$this->id_notification=$id_notification;
			$this->texte_notification=$texte_notification;
	   }
	   
	   /*
		* \pre: l'objet notification est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
	   function show() 
	   {
			echo "id:  ".$this->id_notification. "<br>";
			echo "texte:  ".$this->texte_notification. "<br>";
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de la notification a été défini
		*/
	   function setId_notification($id_notification)
	   {
		   $this->id_notification=$id_notification;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le contenu du texte a été défini
		*/
	   function setTexte($texte_notification)
	   {
		   $this->texte_notification=$texte_notification;
	   }

	   /*
		* \pre: l'id de notification est défini
		* \post: l'id de notification est retournée
		*/
	    function getId_notification()
	   {
		   return $this->id_notification;
	   }
	   
	   /*
		* \pre: le contenu du texte est défini
		* \post: le contenu du texte est retournée
		*/
	   function getTexte()
	   {
		   return $this->texte_notification;
	   }
	} 

	//TEST
	/*$etat_projet= new Notification;
	$etat_projet->init(1,"descrition");
	$etat_projet->show(); */
?>