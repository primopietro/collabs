<?php
	/****************************************    
	Fichier : employe.php    
	Auteur : Boris Zoretic 
	Fonctionnalité : Classe mère permettant la création d'un 
					 employé et ses propriétés
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
	class Employe {
		private $id_employe;
		private $nom;
		private $prenom;
		private $courriel;
		private $mot_passe;
		
		function __construct(){
		   $this->id_employe = 0;
		   $this->nom = "";
		   $this->prenom = "";
		   $this->courriel = "";
		   $this->mot_passe = "";
	   }
	   
	    /*
		* \pre: les paramètres id, n, p, c et mp sont présents lors de l'appel
		* \post: l'objet employé est créé
		*/
	   function init($id, $n, $p, $c, $mp){
		   $this->id_employe = $id;
		   $this->nom = $n;
		   $this->prenom = $p;
		   $this->courriel = $c;
		   $this->mot_passe = $mp;
	   }
	   
	   /*
		* \pre: l'id est défini
		* \post: l'id est retournée
		*/
	   function getIdEmploye(){
		   return $this->id_employe;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id a été défini
		*/
	   function setIdEmploye($id){
		   $this->id_employe = $id;
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
		* \pre: le prénom est défini
		* \post: le prénom est retournée
		*/
	   function getPrenom(){
		   return $this->prenom;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le prénom a été défini
		*/
	   function setPrenom($p){
		   $this->prenom = $p;
	   }
	   
	   /*
		* \pre: le courriel est défini
		* \post: le courriel est retournée
		*/
	   function getCourriel(){
		   return $this->courriel;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le courriel a été défini
		*/
	   function setCourriel($c){
		   $this->courriel = $c;
	   }
	   
	    /*
		* \pre: le mot de passe est défini
		* \post: le mot de passe est retournée
		*/
	   function getMotPasse(){
		   return $this->mot_passe;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le mot de passe a été défini
		*/
	   function setMotPasse($mp){
		   $this->mot_passe = $mp;
	   }
	   
	   /*
		* \pre: l'objet employé est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
		function show() {
			echo "Id_Employe: " . $this->id_employe . "<br>";
			echo "Nom: " . $this->nom . "<br>";
			echo "Prénom: " . $this->prenom . "<br>";
			echo "Courriel: " . $this->courriel . "<br>";
			echo "Mot de passe: " . $this->mot_passe . "<br>";
		}
	}
	
	//TEST
	/*$e = new Employe();
	$e->init(1, "Morin", "Frédérick", "xD@gmail.ca", "4loko");
	$e->show();*/
?> 