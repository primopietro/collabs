<?php
	/****************************************    
	Fichier : image.php    
	Auteur : Boris Zoretic 
	Fonctionnalité : Classe mère permettant la création d'une 
					 image et ses propriétés
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
	17 avril 2017		Boris Zoretic			Création de tous les fonctionnalitées
 
	****************************************/ 
	class Image {
		private $id_image;
		private $path;
		
		function __construct(){
		   $this->id_image = 0;
		   $this->path = "";
	   }
	   
	    /*
		* \pre: les paramètres id_i et p sont présents lors de l'appel
		* \post: l'objet etat_projet est créé
		*/
	   function init($id_i, $p){
		   $this->id_image = $id_i;
		   $this->path = $p;
	   }
	   
	    /*
		* \pre: l'id de l'image est défini
		* \post: l'id de l'image est retournée
		*/
	   function getIdImage(){
		   return $this->id_image;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de l'image a été défini
		*/
	   function setIdImage($id){
		   $this->id_image = $id;
	   }
	   
	   /*
		* \pre: le chemin d'accès est défini
		* \post: le chemin d'accès est retournée
		*/
	   function getPath(){
		   return $this->id_employe;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le chemin d'accès de l'image a été défini
		*/
	   function setPath($path){
		   $this->path = $path;
	   }
	   
	   /*
		* \pre: l'objet image est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
		function show() {
			echo "id_image: " . $this->id_image . "<br>";
			echo "path: " . $this->path . "<br>";
		}
	}
	
	//TEST
	/*$i = new Image();
	$i->init(1, "C:/");
	$i->show();*/
?> 