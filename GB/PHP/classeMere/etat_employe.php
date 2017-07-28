<?php
	/****************************************    
	Fichier : etat_employe.php    
	Auteur : Boris Zoretic 
	Fonctionnalité : Classe mère permettant la création d'un 
					 état d'employé et ses propriétés
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
	class EtatEmploye {
		private $id_etat_employe;
		private $nom;
		private $description;
		
		function __construct(){
		   $this->id_etat_employe = 0;
		   $this->nom = "";
		   $this->description = "";
	   }
	   
	   /*
		* \pre: les paramètres id, n et d sont présents lors de l'appel
		* \post: l'objet etat_employe est créé
		*/
	   function init($id, $n, $d){
		   $this->id_etat_employe = $id;
		   $this->nom = $n;
		   $this->description = $d;
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
		* \pre: le nom est défini
		* \post: le nom est retournée
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
		* \pre: la descritpion est défini
		* \post: la decription est retournée
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
		* \pre: l'objet etat_employe est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
		function show() {
			echo "Id_Etat: " . $this->id_etat_employe . "<br>";
			echo "Nom: " . $this->nom . "<br>";
			echo "Desc: " . $this->description . "<br>";
		}
	}
	
	//TEST
	/*$e = new EtatEmploye();
	$e->init(1, "Morin", "Frédérick");
	$e->show();*/
?> 