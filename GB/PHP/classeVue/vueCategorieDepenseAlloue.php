<?php
/**
    Fichier : vueCategorieDepenseAlloue.php
    Auteur : Boris Zoretic  Pietro Primo
    Fonctionnalité : Permet d'afficher la liste des categorie de dépense Alloue
    Date : 23 avril 2017
 
    Vérification :
    Date                   Nom                       Approuvé
    ========================================================= 
    23 avril 2017        Pietro Primo            OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   Nom                       Description
    ========================================================= 
	23 avril 2017        Boris Zoretic         		Création de toute les fonctionnalitées de la vue
	23 avril 2017        Pietro Primo            	Création de toute les fonctionnalitées de la vue
	29 avril 2017		 Boris Zoretic				Ajout d'un tableau pour l'affichage des catégorie avec un montant alloué
	30 avril 2017		 Boris Zoretic				Suppression de tous les "styles" (remplacé pour des classes)
    **/
	
	require_once("../controlleur/ConnectionBD.php");
	$id = $conn->query("SELECT id_employe_projet FROM employe_projet WHERE id_employe = " . $_GET['idEmploye'] . " AND id_projet =" . $_GET['idProjet'] . " ");
	$idNew = $id->fetch_assoc();
	$id_employe_projet = $idNew["id_employe_projet"];
	
	$result = $conn->query("SELECT *  FROM categorie_depense_alloue cda
							JOIN categorie_depense cd ON cd.id_categorie_depense = cda.id_categorie_depense
							WHERE id_employe_projet= " . $id_employe_projet . "");
	
	
	echo "<table class='fullWidth'>";
	echo "<thead>";
	echo "<th class='thCategorie'>Catégorie</th>";
	echo "<th class='thCategorie'>Montant alloué ($)</th>";
	echo "</thead>";
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			if($row['montant_alloue'] > 0){
				echo "<tr>";
				echo "<td class='tdCategorie'>" . $row['nom'] . "</td>";
				echo "<td class='tdCategorie'>" . $row['montant_alloue'] . "</td>";
				echo "</tr>";
				
			}
		}
	}
	echo "</table>";
?>