<?php
/**
    Fichier : vueProjetPersonne.php
    Auteur : Maxime Proulx
    Fonctionnalité : Permet l'affichage de la page pour modifier le budget d'une personne et d'y ajouter des categorie de dépense
    Date : 19 avril 2017
 
    Vérification :
    Date                   Nom                    Approuvé
    ========================================================= 
    23 avril 2017        Pietro Primo             OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   Nom                    Description
    ========================================================= 
    19 avril 2017        Maxime Proulx            Création de la base avec ajout des categorie à la BD
	20 avril 2017        Boris Zoretic            Création de toute les fonctionnalitées de la vue
	22 avril 2017        Pietro Primo             Ajustement de certaine fonctionnalitées
	24 avril 2017 		 Pietro Primo  			  Changement de l'affichage
	29 avril 2017		 Boris Zoretic 			  Modification des inputs et ajout de classe pour adapter a la validation de formulaire
	30 avril 2017		 Boris Zoretic			  Suppresion de tous les "styles" (remplacé par des classes)
	
    **/
	require_once("../controlleur/ConnectionBD.php");
	$id = $conn->query("SELECT id_employe_projet FROM employe_projet WHERE id_employe = " . $_GET['idEmploye'] . " AND id_projet =" . $_GET['idProjet'] . " ");
	$idNew = $id->fetch_assoc();
	$id_employe_projet = $idNew["id_employe_projet"];
	
	$result = $conn->query("SELECT *  FROM employe_projet ep 
							JOIN projet p ON p.id_projet = ep.id_projet 
							WHERE ep.id_employe_projet= " . $id_employe_projet . "");
	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "<span class='floatLeft'> Budget pour le projet ($): " . $row['montant_alloue'] . "</span>";
			
			echo "<iframe id='frameBudget' name='frameBudget' class='formFrame'></iframe>";
			echo "<form  method='post' action='../classeGestion/GestionEmployeProjet.php' target='frameBudget'>";
			
			echo "<br><label id='erreurBudget' class='erreur'>Veuillez saisir un budget</label><label id='succesBudget' class='succes'>L'enregistrement à été éffectué avec succès</label>";
			echo "<span class='col-12'>Budget pour cette personne ($): ";
			echo "<input class='myinput' type='number' value='" . $row['total_alloue'] . "' name='montant_employeProjet'> </input>";
			
			echo "<input name='idProjet' class='none' value=' " . $_GET['idProjet'] . " '>";
			echo "<input name='idEmploye' class='none' value='" . $_GET['idEmploye'] . "'>";
			
			echo "<button class='btn btn-success btnProjetPersonne' onclick='validerBudget(this.form.montant_employeProjet);'>Modifier budget</button></span><br><br></form><br>";
		}
	}
?>