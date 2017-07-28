<?php
/**
    Fichier : vueCategorieDepense.php
    Auteur : Maxime Proulx
    Fonctionnalité : Permet d'afficher la liste des categorie de dépense
    Date : 21 avril 2017
 
    Vérification :
    Date                   Nom                       Approuvé
    ========================================================= 
    23 avril 2017        Pietro Primo            OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   Nom                       Description
    ========================================================= 
	20 avril 2017        Maxime         			 Création de la majorité des fonctionnalitées de la vue
	20 avril 2017        Pietro Primo            	 Finission des fonctionnalitées
	29 avril 2017		 Boris Zoretic				 Modification des inputs et ajout de classe pour adapter a la validation de formulaire
	30 avril 2017		 Boris Zoretic				 Ajout de style et suppression de tous les "styles" (remplacé par des classes)
    **/
	require_once("../controlleur/ConnectionBD.php");
	
	$result = $conn->query("SELECT *  FROM categorie_depense");
	
	echo "<br><label id='erreurMontant' class='erreur labelMargin'>Veuillez saisir un montant</label><label id='succesMontant' class='succes labelMargin'>L'enregistrement à été éffectué avec succès</label><br>";
	
	if($result->num_rows > 0){
		echo "<span class='col-12'>";
		echo "<select class='myinput comboBoxDepense' name='categorie'>";
		while($row = $result->fetch_assoc()){
			echo "<option value='" . $row['nom'] . "'>" . $row['nom'] . "</option>";
		}
		echo "<select>";
	}
	echo "<input class='myinput' name='montant' type='number' placeholder='Montant alloué ($)'></input>";
?>