<?php
	/****************************************    
	Fichier : type_employe.php    
	Auteur : Boris Zoretic 
	Fonctionnalité : Classe mère permettant la création d'un 
					 type d'employé et ses propriétés
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
	class TypeEmploye {
		private $id_type_employe;
		private $nom;
		private $description;
		
		function __construct(){
		   $this->id_type_employe = 0;
		   $this->nom = "";
		   $this->description = "";
	   }
	   
	   /*
		* \pre: les paramètres id, n et d sont présents lors de l'appel
		* \post: l'objet projet est créé
		*/
	   function init($id, $n, $d){
		   $this->id_type_employe = $id;
		   $this->nom = $n;
		   $this->description = $d;
	   }
	   
	   /*
		* \pre: l'id du type d'employé est défini
		* \post: l'id du type d'employé est retournée
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
		* \pre: la description est défini
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
		* \pre: l'objet type_employe est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
		function show() {
			echo "Id_Type: " . $this->id_type_employe . "<br>";
			echo "Nom: " . $this->nom . "<br>";
			echo "Desc: " . $this->description . "<br>";
		}
	}
	
	//TEST
	/*$e = new TypeEmploye();
	$e->init(1, "Morin", "Frédérick");
	$e->show();*/
?> 