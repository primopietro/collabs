<?php
	/****************************************    
	Fichier : etat_projet.php    
	Auteur : Maxime Proulx 
	Fonctionnalit� : Classe m�re permettant la cr�ation d'un 
					 �tat de projet et ses propri�t�s
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
		* \pre: les param�tres id_etat_projet, nom et description sont pr�sents lors de l'appel
		* \post: l'objet etat_projet est cr��
		*/
		function init($id_etat_projet,$nom,$description) 
	   {
			$this->id_etat_projet=$id_etat_projet;
			$this->nom=$nom;
			$this->description=$description;
	   }
	   
	   /*
		* \pre: l'objet etat_projet est cr��
		* \post: le contenu de l'objet est affich� � l'�cran
		*/
	   function show() 
	   {
			echo $this->id_etat_projet. "<br>";
			echo $this->nom. "<br>";
			echo $this->description. "<br>";
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id de l'�tat du projet a �t� d�fini
		*/
	   function setId_etat_projet($id_etat_projet)
	   {
		   $this->id_etat_projet=$id_etat_projet;
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
		* \pre: l'id de l'�tat du projet est d�fini
		* \post: l'id de l'�tat du projet est retourn�e
		*/
	    function getId_etat_projet()
	   {
		   return $this->id_etat_projet;
	   }
	   
	   /*
		* \pre: le nom est d�fini
		* \post: le nom est retourn�e
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
	$etat_projet->show(); */
?>