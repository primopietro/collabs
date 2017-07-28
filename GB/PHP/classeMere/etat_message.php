<?php
	/****************************************    
	Fichier : etat_message.php    
	Auteur : Boris Zoretic 
	Fonctionnalité : Classe mère permettant la création d'un 
					 état de message et ses propriétés
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
	class EtatMessage {
		private $id_etat_message;
		private $nom;
		private $description;
		
		function __construct(){
		   $this->id_etat_message = 0;
		   $this->nom = "";
		   $this->description = "";
	   }
	   
	   /*
		* \pre: les paramètres id, n et d sont présents lors de l'appel
		* \post: l'objet etat_message est créé
		*/
	   function init($id, $n, $d){
		   $this->id_etat_message = $id;
		   $this->nom = $n;
		   $this->description = $d;
	   }
	   
	   /*
		* \pre: l'id de l'état du message est défini
		* \post: l'id de l'état du message est retournée
		*/
	   function getIdEtatMessage(){
		   return $this->id_etat_message;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de l'état du message a été défini
		*/
	   function setIdEtatMessage($id){
		   $this->id_etat_message = $id;
	   }
	   
	   /*
		* \pre: le nom du message est défini
		* \post: le nom du message est retournée
		*/
	   function getNom(){
		   return $this->nom;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le nom a été défini
		*/
	   function setNom($n){
		   $this->nom = $n;
	   }
	   
	   /*
		* \pre: la description du message est défini
		* \post: la description est retournée
		*/
	   function getDescription(){
		   return $this->description;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: la description a été défini
		*/
	   function setDescription($d){
		   $this->description = $d;
	   }
	   
	   /*
		* \pre: l'objet etat_message est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
		function show() {
			echo "Id_Etat: " . $this->id_etat_message . "<br>";
			echo "Nom: " . $this->nom . "<br>";
			echo "Desc: " . $this->description . "<br>";
		}
	}
	
	//TEST
	/*$m = new EtatMessage();
	$m->init(1, "Morin", "Frédérick");
	$m->show();*/
?> 