<?php
	/****************************************    
	Fichier : employe_projet.php    
	Auteur : Boris Zoretic 
	Fonctionnalité : Classe mère permettant la création d'un 
					 employé dans un projet et ses propriétés
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
	class EmployeProjet {
		private $id_employe_projet;
		private $id_employe;
		private $id_projet;
		private $montant_alloue_employe;
		
		function __construct(){
		   $this->id_employe_projet = 0;
		   $this->id_employe = 0;
		   $this->id_projet = 0;
		   $this->montant_alloue_employe = 0;
	   }
	   
	   /*
		* \pre: les paramètres id_ep, id_e, id_p et montant sont présents lors de l'appel
		* \post: l'objet employe_projet est créé
		*/
	   function init($id_ep, $id_e, $id_p, $montant){
		   $this->id_employe_projet = $id_ep;
		   $this->id_employe = $id_e;
		   $this->id_projet = $id_p;
		   $this->montant_alloue_employe = $montant;
	   }
	   
	   /*
		* \pre: l'id d'un employé dans un projet est défini
		* \post: l'id d'un employé dans un projet est retournée
		*/
	   function getIdEmployeProjet(){
		   return $this->id_employe_projet;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id d'employé dans un projet a été défini
		*/
	   function setIdEmployeProjet($id){
		   $this->id_employe_projet = $id;
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
		* \post: l'id d'employé a été défini
		*/
	   function setIdEmploye($id){
		   $this->id_employe = $id;
	   }
	   
	   /*
		* \pre: l'id du projet est défini
		* \post: l'id du projet est retournée
		*/
	   function getIdProjet(){
		   return $this->id_projet;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de projet a été défini
		*/
	   function setIdProjet($id){
		   $this->id_projet = $id;
	   }
	   
	   /*
		* \pre: le montant est défini
		* \post: le montant est retournée
		*/
	   function getMontant(){
		   return $this->montant_alloue_employe;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le montant a été défini
		*/
	   function setMontant($montant){
		   $this->montant_alloue_employe = $montant;
	   }
	   
	   /*
		* \pre: l'objet employe_projet est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
		function show() {
			echo "Id_EmployeProjet: " . $this->id_employe_projet . "<br>";
			echo "Id_Employe: " . $this->id_employe . "<br>";
			echo "Id_Projet: " . $this->id_projet . "<br>";
			echo "Montant: " . $this->montant_alloue_employe . "<br><br>";
		}
	}
	
	//TEST
	/*$e = new EmployeProjet();
	$e->init(1, 2, 3, 5.99);
	$e->show();*/
?> 