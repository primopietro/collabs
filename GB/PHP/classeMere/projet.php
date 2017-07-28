<?php
	/****************************************    
	Fichier : projet.php    
	Auteur : Maxime Proulx 
	Fonctionnalité : Classe mère permettant la création d'un 
					 projet et ses propriétés
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
		* \pre: les paramètres id_projet, id_etat_projet, nom, dateDebut, dateFin, montantAllouer et montantUtiliser sont présents lors de l'appel
		* \post: l'objet projet est créé
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
		* \pre: l'objet projet est créé
		* \post: le contenu de l'objet est affiché à l'écran
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
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id du projet a été défini
		*/
	   function setIdProjet($id_projet) 
	   {
		   $this->id_projet = $id_projet;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de l'état du projet a été défini
		*/
	   function setIdEtatProjet($id_etat_projet) 
	   {
		   $this->id_etat_projet = $id_etat_projet;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le nom du projet a été défini
		*/
	    function setNom($nom) 
	   {
		   $this->nom = $nom;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le montant alloué a été défini
		*/
	   function setMontantAllouer($montantAllouer) 
	   {
		   $this->montantAllouer = $montantAllouer;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le montant utilisé a été défini
		*/
	   function setMontantUtiliser($montantUtiliser) 
	   {
		   $this->montantUtiliser = $montantUtiliser;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: la date de début a été défini
		*/
	   function setDateDebut($dateDebut) 
	   {
		   $this->dateDebut = $dateDebut;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: la date de fin a été défini
		*/
	   function setDateFin($dateFin) 
	   {
		   $this->dateFin = $dateFin;
	   }
	   
	   /*
		* \pre: l'id du projet est défini
		* \post: l'id de la notification est retournée
		*/
	     function getIdProjet() 
	   {
		  return $this->id_projet;
	   }
	   
	   /*
		* \pre: l'id de l'état du projet est défini
		* \post: l'id de l'état du projet est retournée
		*/
	     function getIdEtatProjet() 
	   {
		  return $this->id_etat_projet;
	   }
	   
	   /*
		* \pre: le nom du projet est défini
		* \post: le nom du projet est retournée
		*/
	    function getNom() 
	   {
		  return $this->nom;
	   }
	   
	    /*
		* \pre: le montant alloué est défini
		* \post: le montant alloué est retournée
		*/
	   function getMontantAllouer() 
	   {
		  return $this->montantAllouer;
	   }
	   
	   /*
		* \pre: le montant utilisé est défini
		* \post: le montant utilisé est retournée
		*/
	   function getMontantUtiliser() 
	   {
		   return $this->montantUtiliser;
	   }
	   
	   /*
		* \pre: la date de début est défini
		* \post: la date de début est retournée
		*/
	   function getDateDebut() 
	   {
		  return $this->dateDebut;
	   }
	   
	   /*
		* \pre: la date de fin est défini
		* \post: la date de fin est retournée
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