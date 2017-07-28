<?php
	/****************************************    
	Fichier : message.php    
	Auteur : Boris Zoretic 
	Fonctionnalité : Classe mère permettant la création d'un 
					 message et ses propriétés
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
	class Message {
		private $id_message;
		private $id_etat_message;
		private $objet;
		private $texte_message;
		private $date_jour_heure;
		private $reponse;
		private $date_heure_reponse;
		
		function __construct(){
		   $this->id_message = 0;
		   $this->id_etat_message = 0;
		   $this->objet = "";
		   $this->texte_message = "";
		   $this->date_jour_heure = "";
		   $this->reponse = "";
		   $this->date_heure_reponse = "";
	   }
	   
	   /*
		* \pre: les paramètres id_m, id_em, p, txt, date_jour, r et date_reponse sont présents lors de l'appel
		* \post: l'objet etat_projet est créé
		*/
	   function init($id_m, $id_em, $o, $txt, $date_jour, $r, $date_reponse){
		   $this->id_message = $id_m;
		   $this->id_etat_message = $id_em;
		   $this->objet = $o;
		   $this->texte_message = $txt;
		   $this->date_jour_heure = $date_jour;
		   $this->reponse = $r;
		   $this->date_heure_reponse = $date_reponse;
	   }
	   
	   /*
		* \pre: l'id du message est défini
		* \post: l'id du message est retournée
		*/
	   function getIdMessage(){
		   return $this->id_message;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id du message a été défini
		*/
	   function setIdMessage($id){
		   $this->id_message = $id;
	   }
	   
	   /*
		* \pre: l'id de l'état du message est défini
		* \post: l'id de l'état du message est retournée
		*/
	   function getIdEtatMessage(){
		   return $this->id_etat_message;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'id de l'état du message a été défini
		*/
	   function setIdEtatMessage($id){
		   $this->id_etat_message = $id;
	   }
	   
	   /*
		* \pre: l'objet est défini
		* \post: l'objet est retournée
		*/
	   function getObjet(){
		   return $this->objet;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: l'objet a été défini
		*/
	   function setObjet($o){
		   $this->Objet = $o;
	   }
	   
	   /*
		* \pre: le contenu du texte est défini
		* \post: le contenu du texte est retournée
		*/
	   function getTxt(){
		   return $this->texte_message;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: le contenu du texte a été défini
		*/
	   function setTxt($txt){
		   $this->texte_message = $txt;
	   }
	   
	   /*
		* \pre: la date du jour est défini
		* \post: la date du jour est retournée
		*/
	   function getDateJourHeure(){
		   return $this->date_jour_heure;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: la date de du jour a été défini
		*/
	   function setDateJourHeure(){
		   $this->date_jour_heure = date('Y-m-d G:i:s');
	   }
	   
	   /*
		* \pre: la réponse est défini
		* \post: la réponse est retournée
		*/
	   function getReponse(){
		   return $this->reponse;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: la réponse a été défini
		*/
	   function setReponse($reponse){
		   $this->reponse = $reponse;
		   $this->setDateReponse();
	   }
	   
	   /*
		* \pre: la date de réponse est défini
		* \post: la date de réponse est retournée
		*/
	   function getDateReponse(){
		   return $this->date_heure_reponse;
	   }
	   
	   /*
		* \pre: le paramètre est présent lors de l'appel
		* \post: la date de réponse a été défini
		*/
	   function setDateReponse(){
		   $this->date_heure_reponse = date('Y-m-d G:i:s');
	   }
	   
	   /*
		* \pre: l'objet message est créé
		* \post: le contenu de l'objet est affiché à l'écran
		*/
		function show() {
			echo "Id_Message: " . $this->id_message . "<br>";
			echo "Id_EtatMessage: " . $this->id_etat_message . "<br>";
			echo "Objet: " . $this->objet . "<br>";
			echo "Texte: " . $this->texte_message . "<br>";
			echo "Date: " . $this->date_jour_heure . "<br>";
			echo "Reponse: " . $this->reponse . "<br>";
			echo "Date réponse: " . $this->date_heure_reponse . "<br><br>";
		}
	}
	
	//TEST
	/*$m = new Message();
	$m->init(1, 2, "Coucou", "T beau");
	$m->show();*/
	
?> 