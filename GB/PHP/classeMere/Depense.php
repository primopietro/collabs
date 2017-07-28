<?php
	/****************************************    
	Fichier : Depense.php    
	Auteur : Maxime Proulx 
	Fonctionnalité : Classe mère permettant la création d'une 
					 dépense et ses propriétés
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
	class Depense {

	   private $id_depense;
	   private $id_employe_projet;
	   private $id_categorie_da;
	   private $montant;
	   private $dateJour;

	   function __construct() 
	   {
			$this->id_depense="";
			$this->id_employe_projet="";
			$this->id_categorie_da="";
			$this->montant="";
			$this->dateJour="";
	   }
	   
	   /*
		* \pre: les paramètres id_depense, id_employe_projet, id_categorie_da, montant et dateJour sont présents lors de l'appel
		* \post: l'objet dépense est créé
		*/
		function init($id_depense,$id_employe_projet,$id_categorie_da,$montant,$dateJour) 
	   {
		    $this->id_depense=$id_depense;
			$this->id_employe_projet=$id_employe_projet;
			$this->id_categorie_da=$id_categorie_da;
			$this->montant= $montant;
			$this->dateJour= $dateJour;
	   }
	   
	    /*
		* \pre: l'objet dépense est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
	   function show() 
	   {
		   	echo "id_depense: ".$this->id_depense."<br>";
			echo "id_employe_projet: ".$this->id_employe_projet."<br>";
			echo "id_categorie_da: ".$this->id_categorie_da."<br>";
			echo "montant: ".$this->montant."<br>";
			echo "dateJour: ".$this->dateJour."<br>";
	   }
	 
		/*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de dépense a été défini
		*/
	    function setId_depense($id_depense) 
	   {
		   $this->id_depense = $id_depense;
	   }
	   
	    /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de l'employé d'un projet a été défini
		*/
	    function setID_employe_Projet($id_employe_projet) 
	   {
		   $this->id_employe_projet = $id_employe_projet;
	   }
	   
	    /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de catégorie de dépense alloué a été défini
		*/
	    function setId_categorie_da($id_categorie_da) 
	   {
		   $this->id_categorie_da = $id_categorie_da;
	   }
	   
	    /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le montant a été défini
		*/
	   function setMontant($montant) 
	   {
		   $this->montant = $montant;
	   }
	   
	    /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: la date du jour a été définie
		*/
	   function setDateJour($dateJour) 
	   {
		   $this->dateJour = $dateJour;
	   }
	   
	    
		/*
		* \pre: l'id de dépense est défini
		* \post: l'id de dépense est retournée
		*/
		function getId_depense($id_depense) 
	   {
		   return $this->id_depense;
	   }
	   
	   /*
		* \pre: l'id de l'employé dans un projet est défini
		* \post: l'id de l'employé dans un projet est retournée
		*/
	   function getID_employe_Projet($id_employe_projet) 
	   {
		   return $this->id_employe_projet;
	   }
	   
	    /*
		* \pre: l'id de catégorie de dépense alloué est défini
		* \post: l'id de catégorie de dépense alloué est retournée
		*/
	    function getId_categorie_da($id_categorie_da) 
	   {
		   return $this->id_categorie_da;
	   }
	   
	    /*
		* \pre: le montant est défini
		* \post: le montant est retournée
		*/
	   function getMontant() 
	   {
		  return $this->montant;
	   }
	   
	    /*
		* \pre: la date du jour est défini
		* \post: la date du jour est retournée
		*/
	   function getDateJour() 
	   {
		  return $this->dateJour;
	   }
	} 

	//TEST
	/*$depense= new Depense;
	$depense->init(1,1,2,"nom",date("j-m-Y H:i:s"));
	$depense->show(); */
?>