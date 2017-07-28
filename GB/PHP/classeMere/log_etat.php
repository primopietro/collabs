<?php
	/****************************************    
	Fichier : log_etat.php    
	Auteur : Boris Zoretic 
	Fonctionnalité : Classe mère permettant la création d'un 
					 log d'état et ses propriétés
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
	class LogEtatEmploye {
		private $id_log_etat;
		private $id_etat_employe;
		private $id_employe;
		private $date_debut;
		
		function __construct(){
		   $this->id_log_etat = 0;
		   $this->id_etat_employe = 0;
		   $this->id_employe = 0;
		   $this->date_debut = "";
	   }
	   
	    /*
		* \pre: les paramètres id_le, id_ee et id_E sont présents lors de l'appel
		* \post: l'objet etat_projet est créé
		*/
	   function init($id_le, $id_ee, $id_E){
		   $this->id_log_etat = $id_le;
		   $this->id_etat_employe = $id_ee;
		   $this->id_employe = $id_E;
		   $this->setDateDebut();
	   }
	   
	   /*
		* \pre: l'id du log d'état est défini
		* \post: l'id du log d'état est retournée
		*/
	   function getIdLogEtat(){
		   return $this->id_log_etat;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id du log d'état est retournée a été défini
		*/
	   function setIdLogEtat($id){
		   $this->id_log_etat = $id;
	   }
	   
	   /*
		* \pre: l'id de l'état de l'employé est défini
		* \post: l'id de l'état de l'employé est retournée
		*/
	   function getIdEtatEmploye(){
		   return $this->id_etat_employe;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de l'état de l'employé a été défini
		*/
	   function setIdEtatEmploye($id){
		   $this->id_etat_employe = $id;
	   }
	   
	   /*
		* \pre: l'id de l'employé est défini
		* \post: l'id de l'employé est retournée
		*/
	   function getIdEmploye(){
		   return $this->id_employe;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de l'employé a été défini
		*/
	   function setIdEmploye($id){
		   $this->id_employe = $id;
	   }
	   
	   /*
		* \pre: la date de début est défini
		* \post: la date de début est retournée
		*/
	   function getDateDebut(){
		   return $this->date_debut;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: la date de début a été défini
		*/
	   function setDateDebut(){
		   $this->date_debut = date('Y-m-d G:i:s');
	   }
	   
	   /*
		* \pre: l'objet log_etat est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
		function show() {
			echo "id_log: " . $this->id_log_etat . "<br>";
			echo "id_etat_employe: " . $this->id_etat_employe . "<br>";
			echo "id_employe: " . $this->id_employe . "<br>";
			echo "Date: " . $this->date_debut . "<br>";
		}
	}
	
	/*$e = new LogEtatEmploye();
	$e->init(1, 1, 1);
	$e->show();*/
?> 