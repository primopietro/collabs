<?php
/**
    Fichier : vueProjets.php
    Auteur : Maxime Proulx
    Fonctionnalité : Permet l'affichage de la liste des projets et de les trié ainsi que la création d'un nouveau pojet
    Date : 19 avril 2017
 
    Vérification :
    Date                   Nom                    Approuvé
    ========================================================= 
    23 avril 2017        Pietro Primo             OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   Nom                       Description
    ========================================================= 
    19 avril 2017        Maxime Proulx            Création de la base de l'affihcage de la liste des projets
	20 avril 2017        Boris Zoretic            Création de toute les fonctionnalitées de la vue
	22 avril 2017        Pietro Primo          	  Ajustement de certaine fonctionnalitées
	24 avril 2017        Maxime Proulx         	  Modification en tableau début ajout recherche
	26 avril 2017        Maxime Proulx         	  Finir ajout recherche
	28 avril 2017        Pietro Primo         	  Suppression code inutile 
    **/
	require_once("../controlleur/ConnectionBD.php");
	$result = $conn->query("SELECT * FROM projet ORDER BY date_debut ");

	if($result->num_rows > 0){
		echo "<input class='width25' type='text' id='nom' onkeyup='rechercheNomProjet()' placeholder='Chercher un nom'>";
		echo "<input class='width25' type='text' id='date' onkeyup='rechercheDateProjet()' placeholder='Chercher une date'>";
		echo "<input class='width25' type='text' id='budget' onkeyup='rechercheBudgetProjet()' placeholder='Chercher un budget'>";
		echo "<input class='width25' type='text' id='depense' onkeyup='rechercheDepenseProjet()' placeholder='Chercher un montant dépensé'><br><br>";
		echo "<table id='projetTable'  class='col-xs-12  table table-hover'>";
		echo "<tr>";
				echo "<th> Nom </th>";
				echo "<th> Date de début </th>";
				echo "<th> Budget alloué: </th>";
				echo "<th> Montant Utilisé: </th>";
			echo "</tr>";
		while($row = $result->fetch_assoc()){
			$id = ((($row["id_projet"]) + 1) * 666 ) - 666;
			if( $row["id_etat_projet"] == 1 ){				
				echo "<tr>";
			}
			else if($row["id_etat_projet"] == 2){
				echo "<tr  class='fini'>";
			}
			else {
				echo "<tr class='annule'>";
			}
				echo "<td> <a href='projet.php?idProjet=" . $id . "'>" . $row["nom"] . "</a></td>";
				echo "<td>" . $row["date_debut"] . "</td>";
				echo "<td>" . $row["montant_alloue"] . "</td>";
				echo "<td>" . $row["montant_utilise"]  . "</td>";
			echo "</tr>";
			
		}
		echo "</table>";
	}
?>