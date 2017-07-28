<?php
	/****************************************    
	Fichier : Categorie_depense.php    
	Auteur : Maxime Proulx 
	Fonctionnalité : Classe mère permettant la création d'une 
					 catégorie de dépense et ses propriétés
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
	class Categorie_depense {

	   private  $id_categorie_depense;
	   private  $nom;
	   private  $description;

	   function __construct() 
	   {
			$this->id_categorie_depense="";
			$this->nom="";
			$this->description="";
	   }
	   
	   /*
		* \pre: les paramètres id_categorie_depense, nom et description sont présents lors de l'appel
		* \post: l'objet catégorie de dépense est créé
		*/
		function init($id_categorie_depense,$nom,$description) 
	   {
			$this->id_categorie_depense=$id_categorie_depense;
			$this->nom=$nom;
			$this->description=$description;
	   }
	   
	   /*
		* \pre: l'objet catégorie de dépense est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
	   function show() 
	   {
			echo "Id: " . $this->id_categorie_depense. "<br>";
			echo "Nom: " . $this->nom. "<br>";
			echo "Desc: " . $this->description. "<br><br>";
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id a été défini
		*/
	   function setId($id_categorie_depense)
	   {
		   $this->id_categorie_depense=$id_categorie_depense;
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
		* \pre: l'id est défini
		* \post: l'id est retournée
		*/
	    function getId()
	   {
		   return $this->id_categorie_depense;
	   }
	   
	    /*
		* \pre: le nom est défini
		* \post: le nom est retourné
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
	$etat_projet->show();*/
?>