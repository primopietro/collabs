<?php
	/****************************************    
	Fichier : etat_projet.php    
	Auteur : Maxime Proulx 
	Fonctionnalité : Classe mère permettant la création d'un 
					 état de projet et ses propriétés
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
	class Etat_projet {

	   private  $id_etat_projet;
	   private  $nom;
	   private  $description;

	    //constructeur par default
	   function __construct() 
	   {
			$this->id_etat_projet="";
			$this->nom="";
			$this->description="";
	   }
	   
	   /*
		* \pre: les paramètres id_etat_projet, nom et description sont présents lors de l'appel
		* \post: l'objet etat_projet est créé
		*/
		function init($id_etat_projet,$nom,$description) 
	   {
			$this->id_etat_projet=$id_etat_projet;
			$this->nom=$nom;
			$this->description=$description;
	   }
	   
	   /*
		* \pre: l'objet etat_projet est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
	   function show() 
	   {
			echo $this->id_etat_projet. "<br>";
			echo $this->nom. "<br>";
			echo $this->description. "<br>";
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de l'état du projet a été défini
		*/
	   function setId_etat_projet($id_etat_projet)
	   {
		   $this->id_etat_projet=$id_etat_projet;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le nom a été défini
		*/
	   function setNom($nom)
	   {
		   $this->nom=$nom;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: la description a été défini
		*/
	   function setDescription($description)
	   {
		   $this->description=$description;
	   }
	   
	   
	   /*
		* \pre: l'id de l'état du projet est défini
		* \post: l'id de l'état du projet est retournée
		*/
	    function getId_etat_projet()
	   {
		   return $this->id_etat_projet;
	   }
	   
	   /*
		* \pre: le nom est défini
		* \post: le nom est retournée
		*/
	   function getNom()
	   {
		   return $this->nom;
	   }
	   
	   /*
		* \pre: la description est défini
		* \post: la description est retournée
		*/
	   function getDescription()
	   {
		   return $this->description;
	   }
	 
	} 

	//TEST
	/*$etat_projet= new Etat_projet;
	$etat_projet->init(1,"nom","descrition");
	$etat_projet->show(); */
?>