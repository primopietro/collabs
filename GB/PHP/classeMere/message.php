<?php
	/****************************************    
	Fichier : message.php    
	Auteur : Boris Zoretic 
	Fonctionnalit� : Classe m�re permettant la cr�ation d'un 
					 message et ses propri�t�s
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
	17 avril 2017		Boris Zoretic			Cr�ation de tous les fonctionnalit�es
 
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
		* \pre: les param�tres id_m, id_em, p, txt, date_jour, r et date_reponse sont pr�sents lors de l'appel
		* \post: l'objet etat_projet est cr��
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
		* \pre: l'id du message est d�fini
		* \post: l'id du message est retourn�e
		*/
	   function getIdMessage(){
		   return $this->id_message;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id du message a �t� d�fini
		*/
	   function setIdMessage($id){
		   $this->id_message = $id;
	   }
	   
	   /*
		* \pre: l'id de l'�tat du message est d�fini
		* \post: l'id de l'�tat du message est retourn�e
		*/
	   function getIdEtatMessage(){
		   return $this->id_etat_message;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'id de l'�tat du message a �t� d�fini
		*/
	   function setIdEtatMessage($id){
		   $this->id_etat_message = $id;
	   }
	   
	   /*
		* \pre: l'objet est d�fini
		* \post: l'objet est retourn�e
		*/
	   function getObjet(){
		   return $this->objet;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: l'objet a �t� d�fini
		*/
	   function setObjet($o){
		   $this->Objet = $o;
	   }
	   
	   /*
		* \pre: le contenu du texte est d�fini
		* \post: le contenu du texte est retourn�e
		*/
	   function getTxt(){
		   return $this->texte_message;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: le contenu du texte a �t� d�fini
		*/
	   function setTxt($txt){
		   $this->texte_message = $txt;
	   }
	   
	   /*
		* \pre: la date du jour est d�fini
		* \post: la date du jour est retourn�e
		*/
	   function getDateJourHeure(){
		   return $this->date_jour_heure;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: la date de du jour a �t� d�fini
		*/
	   function setDateJourHeure(){
		   $this->date_jour_heure = date('Y-m-d G:i:s');
	   }
	   
	   /*
		* \pre: la r�ponse est d�fini
		* \post: la r�ponse est retourn�e
		*/
	   function getReponse(){
		   return $this->reponse;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: la r�ponse a �t� d�fini
		*/
	   function setReponse($reponse){
		   $this->reponse = $reponse;
		   $this->setDateReponse();
	   }
	   
	   /*
		* \pre: la date de r�ponse est d�fini
		* \post: la date de r�ponse est retourn�e
		*/
	   function getDateReponse(){
		   return $this->date_heure_reponse;
	   }
	   
	   /*
		* \pre: le param�tre est pr�sent lors de l'appel
		* \post: la date de r�ponse a �t� d�fini
		*/
	   function setDateReponse(){
		   $this->date_heure_reponse = date('Y-m-d G:i:s');
	   }
	   
	   /*
		* \pre: l'objet message est cr��
		* \post: le contenu de l'objet est affich� � l'�cran
		*/
		function show() {
			echo "Id_Message: " . $this->id_message . "<br>";
			echo "Id_EtatMessage: " . $this->id_etat_message . "<br>";
			echo "Objet: " . $this->objet . "<br>";
			echo "Texte: " . $this->texte_message . "<br>";
			echo "Date: " . $this->date_jour_heure . "<br>";
			echo "Reponse: " . $this->reponse . "<br>";
			echo "Date r�ponse: " . $this->date_heure_reponse . "<br><br>";
		}
	}
	
	//TEST
	/*$m = new Message();
	$m->init(1, 2, "Coucou", "T beau");
	$m->show();*/
	
?> 