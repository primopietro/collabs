<?php
	/****************************************    
	Fichier : getDepenses.php    
	Auteur : Pietro Primo	   
	Fonctionnalité : Permet obtenir une liste avec tous les depenses 
	Date : 01 mai 2017
 
	Vérification :    
	Date               	Nom                   	Approuvé    
	========================================================= 
	01 mai 2017			Pietro Primo			OUI
 
 
	Historique de modifications :    
	Date               	Nom                   	Description    
	========================================================= 
 
	****************************************/ 

	require_once("../classeGestion/GestionCategorieAlloue.php");
	/*
	class getCategorieEdepenses {
		private $listeCategorie;
		
		function __construct(){
			$this->listeCategorie = [];
		}
		
	
		function init(){
			$categories = new GestionCategorieAlloue();
			$categories->init();			
			$this->listeCategorie = $categories->getListeCategorie();
			
		}
		
		function getListe(){
			$this->init();
			echo "{ 'listeCDA': [";
			print json_encode($this->listeCategorie);
			echo "]}";
		}

	}
	*/
	
	//$depenses = new getCategorieEdepenses();
	//$depenses->getListe();
	
	
	
	
	$categories = new GestionCategorieAlloue();
	$categories->init();
	$categories->getListeCategorieJson();
?>