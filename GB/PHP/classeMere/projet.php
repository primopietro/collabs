<?php
	/****************************************    
	Fichier : projet.php    
	Auteur : Maxime Proulx 
	Fonctionnalit� : Classe m�re permettant la cr�ation d'un 
					 projet et ses propri�t�s
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
	class Projet {

	   private $id_projet;
	   private $id_etat_projet;
	   private $nom;
	   private $montantAllouer;
	   private $montantUtiliser;
	   private $dateDebut;
	   private $dateFin;

	   
	   function __construct() 
	   {
			$this->id_projet="";
			$this->id_etat_projet="";
			$this->nom="";
			$this->montantAllouer="";
			$this->montantUtiliser="";
			$this->dateDebut="";
			$this->dateFin="";
	   }
	   
	   /*
		* \pre: les param�tres id_projet, id_etat_projet, nom, dateDebut, dateFin, montantAllouer et montantUtiliser sont pr�sents lors de l'appel
		* \post: l'objet projet est cr��
		*/
		function init($id_projet, $id_etat_projet, $nom, $dateDebut, $dateFin, $montantAllouer,$montantUtiliser) 
	   {
		   $this->id_projet = $id_projet;
		   $this->id_etat_projet = $id_etat_projet;
		   $this->nom = $nom;
		   $this->montantAllouer = $montantAllouer;
		   $this->montantUtiliser = $montantUtiliser;
		   $this->dateDebut = $dateDebut;
		   $this->dateFin = $dateFin;
	   }
	   
	   /*
		* \pre: l'objet projet est cr��
		* \post: le contenu de l'objet est affich� � l'�cran
		*/
	   function show() 
	   {
			echo "id_projet: ".$this->id_projet."<br>";
			echo "id_etat_projet: ".$this->id_etat_projet."<br>";
		    echo "nom: ".$this->nom."<br>";
			echo "montantAllouer: ".$this->montantAllouer."<br>";
			echo "montantUtiliser: ".$this->montantUtiliser."<br>";
			echo "dateDebut: ".$this->dateDebut."<br>";
			echo "dateFin: ".$this->dateFin."<br><br>";
	   }
	   
	  /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id du projet a �t� d�fini
		*/
	   function setIdProjet($id_projet) 
	   {
		   $this->id_projet = $id_projet;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id de l'�tat du projet a �t� d�fini
		*/
	   function setIdEtatProjet($id_etat_projet) 
	   {
		   $this->id_etat_projet = $id_etat_projet;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: le nom du projet a �t� d�fini
		*/
	    function setNom($nom) 
	   {
		   $this->nom = $nom;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: le montant allou� a �t� d�fini
		*/
	   function setMontantAllouer($montantAllouer) 
	   {
		   $this->montantAllouer = $montantAllouer;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: le montant utilis� a �t� d�fini
		*/
	   function setMontantUtiliser($montantUtiliser) 
	   {
		   $this->montantUtiliser = $montantUtiliser;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: la date de d�but a �t� d�fini
		*/
	   function setDateDebut($dateDebut) 
	   {
		   $this->dateDebut = $dateDebut;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: la date de fin a �t� d�fini
		*/
	   function setDateFin($dateFin) 
	   {
		   $this->dateFin = $dateFin;
	   }
	   
	   /*
		* \pre: l'id du projet est d�fini
		* \post: l'id de la notification est retourn�e
		*/
	     function getIdProjet() 
	   {
		  return $this->id_projet;
	   }
	   
	   /*
		* \pre: l'id de l'�tat du projet est d�fini
		* \post: l'id de l'�tat du projet est retourn�e
		*/
	     function getIdEtatProjet() 
	   {
		  return $this->id_etat_projet;
	   }
	   
	   /*
		* \pre: le nom du projet est d�fini
		* \post: le nom du projet est retourn�e
		*/
	    function getNom() 
	   {
		  return $this->nom;
	   }
	   
	    /*
		* \pre: le montant allou� est d�fini
		* \post: le montant allou� est retourn�e
		*/
	   function getMontantAllouer() 
	   {
		  return $this->montantAllouer;
	   }
	   
	   /*
		* \pre: le montant utilis� est d�fini
		* \post: le montant utilis� est retourn�e
		*/
	   function getMontantUtiliser() 
	   {
		   return $this->montantUtiliser;
	   }
	   
	   /*
		* \pre: la date de d�but est d�fini
		* \post: la date de d�but est retourn�e
		*/
	   function getDateDebut() 
	   {
		  return $this->dateDebut;
	   }
	   
	   /*
		* \pre: la date de fin est d�fini
		* \post: la date de fin est retourn�e
		*/
	   function getDateFin() 
	   {
		  return $this->dateFin;
	   }
	} 

	//TEST
	/*$projet= new Projet;
	$projet->init(1,1,"nom","1","2",date("j-m-Y"),date("j-m-Y"));
	$projet->show(); */
?>