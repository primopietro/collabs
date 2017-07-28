<?php
	/****************************************    
	Fichier : ClassificationEmploye.php    
	Auteur : Boris Zoretic
	Fonctionnalité : Classe mère permettant la création d'une 
					 classification d'employé et ses propriétés
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
	class ClassificationEmploye {
		private $id_classification;
		private $id_type_employe;
		private $id_employe;
		
		function __construct(){
		   $this->id_classification = 0;
		   $this->id_type_employe = 0;
		   $this->id_employe = 0;
	   }
	   
	   /*
		* \pre: les paramètres id_c, id_te, id_e sont présents lors de l'appel
		* \post: l'objet classification employé est créé
		*/
	   function init($id_c, $id_te, $id_e){
		   $this->id_classification = $id_c;
		   $this->id_type_employe = $id_te;
		   $this->id_employe = $id_e;
	   }
	   
	   /*
		* \pre: l'id de classification de l'employé est défini
		* \post: l'id de classification de l'employé est retournée
		*/
	   function getIdClassification(){
		   return $this->id_classification;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de classification de l'employé a été défini
		*/
	   function setIdClassification($id){
		   $this->id_classification = $id;
	   }
	   
	   /*
		* \pre: l'id de type de l'employé est défini
		* \post: l'id de type de l'employé est retournée
		*/
	   function getIdTypeEmploye(){
		   return $this->id_type_employe;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id du type d'employé a été défini
		*/
	   function setIdTypeEmploye($id){
		   $this->id_type_employe = $id;
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
		* \pre: l'objet classification employé est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
		function show() {
			echo "Id_Class: " . $this->id_classification . "<br>";
			echo "Id_Type: " . $this->id_type_employe . "<br>";
			echo "Id_Employe: " . $this->id_employe . "<br>";
		}
	}
	
	//TEST
	/*$e = new ClassificationEmploye();
	$e->init(1, 2, 3);
	$e->show();*/
?> 