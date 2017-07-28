<?php
	/****************************************    
	Fichier : Depense.php    
	Auteur : Maxime Proulx 
	Fonctionnalit� : Classe m�re permettant la cr�ation d'une 
					 d�pense et ses propri�t�s
	Date : 17 avril 2017
 
	V�rification :    
	Date               	Nom                   	Approuv�    
	========================================================= 
	23 avril 2017		Pietro Primo			OUI
	23 avril 2017		Maxime Proulx			OUI
	23 avril 2017		Boris Zoretic			OUI
 
 
	Historique de modifications :    
	Date               	Nom                   	Description    
	========================================================= 
	17 avril 2017		Maxime Proulx			Cr�ation de tous les fonctionnalit�es
 
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
		* \pre: les param�tres id_depense, id_employe_projet, id_categorie_da, montant et dateJour sont pr�sents lors de l'appel
		* \post: l'objet d�pense est cr��
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
		* \pre: l'objet d�pense est cr��
		* \post: le contenu de l'objet est affich� � l'�cran
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
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id de d�pense a �t� d�fini
		*/
	    function setId_depense($id_depense) 
	   {
		   $this->id_depense = $id_depense;
	   }
	   
	    /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id de l'employ� d'un projet a �t� d�fini
		*/
	    function setID_employe_Projet($id_employe_projet) 
	   {
		   $this->id_employe_projet = $id_employe_projet;
	   }
	   
	    /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id de cat�gorie de d�pense allou� a �t� d�fini
		*/
	    function setId_categorie_da($id_categorie_da) 
	   {
		   $this->id_categorie_da = $id_categorie_da;
	   }
	   
	    /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: le montant a �t� d�fini
		*/
	   function setMontant($montant) 
	   {
		   $this->montant = $montant;
	   }
	   
	    /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: la date du jour a �t� d�finie
		*/
	   function setDateJour($dateJour) 
	   {
		   $this->dateJour = $dateJour;
	   }
	   
	    
		/*
		* \pre: l'id de d�pense est d�fini
		* \post: l'id de d�pense est retourn�e
		*/
		function getId_depense($id_depense) 
	   {
		   return $this->id_depense;
	   }
	   
	   /*
		* \pre: l'id de l'employ� dans un projet est d�fini
		* \post: l'id de l'employ� dans un projet est retourn�e
		*/
	   function getID_employe_Projet($id_employe_projet) 
	   {
		   return $this->id_employe_projet;
	   }
	   
	    /*
		* \pre: l'id de cat�gorie de d�pense allou� est d�fini
		* \post: l'id de cat�gorie de d�pense allou� est retourn�e
		*/
	    function getId_categorie_da($id_categorie_da) 
	   {
		   return $this->id_categorie_da;
	   }
	   
	    /*
		* \pre: le montant est d�fini
		* \post: le montant est retourn�e
		*/
	   function getMontant() 
	   {
		  return $this->montant;
	   }
	   
	    /*
		* \pre: la date du jour est d�fini
		* \post: la date du jour est retourn�e
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