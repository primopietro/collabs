<?php
	/****************************************    
	Fichier : Categorie_depense.php    
	Auteur : Maxime Proulx 
	Fonctionnalit� : Classe m�re permettant la cr�ation d'une 
					 cat�gorie de d�pense et ses propri�t�s
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
		* \pre: les param�tres id_categorie_depense, nom et description sont pr�sents lors de l'appel
		* \post: l'objet cat�gorie de d�pense est cr��
		*/
		function init($id_categorie_depense,$nom,$description) 
	   {
			$this->id_categorie_depense=$id_categorie_depense;
			$this->nom=$nom;
			$this->description=$description;
	   }
	   
	   /*
		* \pre: l'objet cat�gorie de d�pense est cr��
		* \post: le contenu de l'objet est affich� � l'�cran
		*/
	   function show() 
	   {
			echo "Id: " . $this->id_categorie_depense. "<br>";
			echo "Nom: " . $this->nom. "<br>";
			echo "Desc: " . $this->description. "<br><br>";
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id a �t� d�fini
		*/
	   function setId($id_categorie_depense)
	   {
		   $this->id_categorie_depense=$id_categorie_depense;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: le nom a �t� d�fini
		*/
	   function setNom($nom)
	   {
		   $this->nom=$nom;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: la description a �t� d�fini
		*/
	   function setDescription($description)
	   {
		   $this->description=$description;
	   }
	   
	   
	   /*
		* \pre: l'id est d�fini
		* \post: l'id est retourn�e
		*/
	    function getId()
	   {
		   return $this->id_categorie_depense;
	   }
	   
	    /*
		* \pre: le nom est d�fini
		* \post: le nom est retourn�
		*/
	   function getNom()
	   {
		   return $this->nom;
	   }
	   
	    /*
		* \pre: la description est d�fini
		* \post: la description est retourn�e
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