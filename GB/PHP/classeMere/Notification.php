<?php
	/****************************************    
	Fichier : Notification.php    
	Auteur : Maxime Proulx 
	Fonctionnalit� : Classe m�re permettant la cr�ation d'une 
					 notification et ses propri�t�s
	Date : 17 avril 2017
 
	V�rification :    
	Date               	Nom                   	Approuv�    
	========================================================= 
	23 avril 2017		Pietro Primo			OUI
	23 avril 2017		Maxime Proulx			OUI
	23 avril 2017		Boris Zoretic			OUI
 
 
	Historique de modifications :    
	Date               	Nom                   	Description    
	========================================================= 
	17 avril 2017		Maxime Proulx			Cr�ation de tous les fonctionnalit�es
 
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
		* \pre: les param�tres id_notification et texte_notification sont pr�sents lors de l'appel
		* \post: l'objet notification est cr��
		*/
		function init($id_notification,$texte_notification) 
	   {
			$this->id_notification=$id_notification;
			$this->texte_notification=$texte_notification;
	   }
	   
	   /*
		* \pre: l'objet notification est cr��
		* \post: le contenu de l'objet est affich� � l'�cran
		*/
	   function show() 
	   {
			echo "id:  ".$this->id_notification. "<br>";
			echo "texte:  ".$this->texte_notification. "<br>";
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id de la notification a �t� d�fini
		*/
	   function setId_notification($id_notification)
	   {
		   $this->id_notification=$id_notification;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: le contenu du texte a �t� d�fini
		*/
	   function setTexte($texte_notification)
	   {
		   $this->texte_notification=$texte_notification;
	   }

	   /*
		* \pre: l'id de notification est d�fini
		* \post: l'id de notification est retourn�e
		*/
	    function getId_notification()
	   {
		   return $this->id_notification;
	   }
	   
	   /*
		* \pre: le contenu du texte est d�fini
		* \post: le contenu du texte est retourn�e
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