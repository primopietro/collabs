<?php
	/****************************************    
	Fichier : Categorie_depense_alloue.php    
	Auteur : Maxime Proulx 
	Fonctionnalité : Classe mère permettant la création d'une 
					 catégorie de dépense avec un montant alloué et ses propriétés
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
	class Categorie_depense_alloue {

	   private  $id_categorie_da;
	   private  $id_categorie_depense;
	   private  $id_employe_projet;
	   private  $montant_alloue;

	    //constructeur par default
	   function __construct() 
	   {
			$this->id_categorie_da="";
			$this->id_categorie_depense="";
			$this->montant_alloue="";
			$this->id_employe_projet="";
	   }
	   
	   /*
		* \pre: les paramètres id_categorie_da, id_categorie_depense, id_employe_projet et montant_alloue sont présents
		* \post: l'objet catégorie de dépense alloué a été créé
		*/
		function init($id_categorie_da,$id_categorie_depense,$id_employe_projet,$montant_alloue) 
	   {
			$this->id_categorie_da=$id_categorie_da;
			$this->id_categorie_depense=$id_categorie_depense;
			$this->id_employe_projet=$id_employe_projet;
			$this->montant_alloue=$montant_alloue;
	   }
	   
	   /*
		* \pre: l'objet catégorie de dépense alloué est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
	   function show() 
	   {
			echo "Id_cda: " . $this->id_categorie_da. "<br>";
			echo "Id_cd: " . $this->id_categorie_depense. "<br>";
			echo "Id_ep: " . $this->id_employe_projet. "<br>";
			echo "Montant: " . $this->montant_alloue. "<br><br>";
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de la catégorie de dépense alloué a été défini
		*/
	   function setIdCategorieDa($id_categorie_da)
	   {
		   $this->id_categorie_da=$id_categorie_da;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de catégorie de dépense a été défini
		*/
	   function setId_categorie_depense($id_categorie_depense)
	   {
		   $this->id_categorie_depense=$id_categorie_depense;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de l'employé dans le projet a été défini
		*/
	    function setId_employe_projet($id_employe_projet)
	   {
		   $this->id_employe_projet=$id_employe_projet;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le montant alloué a été défini
		*/
	   function setMontant_alloue($montant_alloue)
	   {
		   $this->montant_alloue=$montant_alloue;
	   }
	   
	   
	   /*
		* \pre: l'id de catégorie de dépense alloué est défini
		* \post: l'id de catégorie de dépense alloué est retournée
		*/
	    function getIdCategorieDa()
	   {
		   return $this->id_categorie_da;
	   }
	   
	   /*
		* \pre: l'id de catégorie de dépense est défini
		* \post: l'id de catégorie de dépense est retournée
		*/
	   function getId_categorie_depense()
	   {
		   return $this->id_categorie_depense;
	   }
	   
	   /*
		* \pre: l'id de l'employé dans le projet est défini
		* \post: l'id de l'employé dans le projet est retournée
		*/
	    function getId_employe_projet()
	   {
		   return $this->id_employe_projet;
	   }
	   
	   /*
		* \pre: le montant alloué est défini
		* \post: le montant alloué est retournée
		*/
	   function getMontant_alloue()
	   {
		   return $this->montant_alloue;
	   }
	 
	} 

	//TEST
	/*$depense= new Categorie_depense_alloue;
	$depense->init(1,1,1,45.5);
	$depense->show(); */
?>