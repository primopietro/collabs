<?php
	/****************************************    
	Fichier : Categorie_depense_alloue.php    
	Auteur : Maxime Proulx 
	Fonctionnalit� : Classe m�re permettant la cr�ation d'une 
					 cat�gorie de d�pense avec un montant allou� et ses propri�t�s
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
		* \pre: les param�tres id_categorie_da, id_categorie_depense, id_employe_projet et montant_alloue sont pr�sents
		* \post: l'objet cat�gorie de d�pense allou� a �t� cr��
		*/
		function init($id_categorie_da,$id_categorie_depense,$id_employe_projet,$montant_alloue) 
	   {
			$this->id_categorie_da=$id_categorie_da;
			$this->id_categorie_depense=$id_categorie_depense;
			$this->id_employe_projet=$id_employe_projet;
			$this->montant_alloue=$montant_alloue;
	   }
	   
	   /*
		* \pre: l'objet cat�gorie de d�pense allou� est cr��
		* \post: le contenu de l'objet est affich� � l'�cran
		*/
	   function show() 
	   {
			echo "Id_cda: " . $this->id_categorie_da. "<br>";
			echo "Id_cd: " . $this->id_categorie_depense. "<br>";
			echo "Id_ep: " . $this->id_employe_projet. "<br>";
			echo "Montant: " . $this->montant_alloue. "<br><br>";
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id de la cat�gorie de d�pense allou� a �t� d�fini
		*/
	   function setIdCategorieDa($id_categorie_da)
	   {
		   $this->id_categorie_da=$id_categorie_da;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id de cat�gorie de d�pense a �t� d�fini
		*/
	   function setId_categorie_depense($id_categorie_depense)
	   {
		   $this->id_categorie_depense=$id_categorie_depense;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id de l'employ� dans le projet a �t� d�fini
		*/
	    function setId_employe_projet($id_employe_projet)
	   {
		   $this->id_employe_projet=$id_employe_projet;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: le montant allou� a �t� d�fini
		*/
	   function setMontant_alloue($montant_alloue)
	   {
		   $this->montant_alloue=$montant_alloue;
	   }
	   
	   
	   /*
		* \pre: l'id de cat�gorie de d�pense allou� est d�fini
		* \post: l'id de cat�gorie de d�pense allou� est retourn�e
		*/
	    function getIdCategorieDa()
	   {
		   return $this->id_categorie_da;
	   }
	   
	   /*
		* \pre: l'id de cat�gorie de d�pense est d�fini
		* \post: l'id de cat�gorie de d�pense est retourn�e
		*/
	   function getId_categorie_depense()
	   {
		   return $this->id_categorie_depense;
	   }
	   
	   /*
		* \pre: l'id de l'employ� dans le projet est d�fini
		* \post: l'id de l'employ� dans le projet est retourn�e
		*/
	    function getId_employe_projet()
	   {
		   return $this->id_employe_projet;
	   }
	   
	   /*
		* \pre: le montant allou� est d�fini
		* \post: le montant allou� est retourn�e
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