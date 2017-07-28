<?php
/**
    Fichier : vueMessages.php
    Auteur : Maxime Proulx
    Fonctionnalité : Permet d'afficher la liste des message Alloue
    Date : 21 avril 2017
 
    Vérification :
    Date                   Nom                       Approuvé
    ========================================================= 
    23 avril 2017        Pietro Primo            OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   Nom                      Description
    ========================================================= 
	21 avril 2017        Maxime Proulx       		Création de toute les fonctionnalitées de la vue
	21 avril 2017        Pietro Primo            	Finission des fonctionnalité et amélioration
	30 avril 2017		 Boris Zoretic				Suppression de tous les "styles" (remplacé pour des classes)
    **/
	

session_start();
$_SESSION["message"]='1';
	require_once("../controlleur/ConnectionBD.php");
	$result = $conn->query("SELECT p.nom as nomProjet, e.nom as nomEmploye, e.prenom as prenomEmploye,
							p.id_projet as idProject, e.id_employe as idEmploye, m.* 
							FROM message_ep me
							JOIN message m ON me.id_message = m.id_message 
							JOIN employe_projet ep ON me.id_employe_projet = ep.id_employe_projet
							JOIN employe e ON e.id_employe = ep.id_employe
							JOIN projet p ON p.id_projet = ep.id_projet ORDER BY m.moment_envoye DESC;");
	

	if($result->num_rows > 0){
		//afficher toutes les notifications
		while($row = $result->fetch_assoc()){	
		//met un fond de couleur si la demande est accpeté ou refusé
			if( $row["id_etat_message"]==1)
			{
				echo "<div class='col-12 notification'>";
			}
			else if( $row["id_etat_message"]==2)
			{
				echo "<div class='col-12 notification accepte'>";
			}
			else if( $row["id_etat_message"]==3)
			{
				echo "<div class='col-12 notification refuse'>";
			}
			$id = ((($row["idEmploye"]) + 1) * 666 ) - 666;
			$idp = ((($row["idProject"]) + 1) * 666 ) - 666;
			echo "<span>" . "Envoyer par: <a href='modifierEmploye.php?idEmploye=" . $id . "'>". $row["prenomEmploye"]. ", " .$row["nomEmploye"]."</a></span>";
			echo "<br/><br/>";
			echo "<span>" . "Date: " . $row["moment_envoye"] . "</span>";
			echo "<br/><br/>";
			echo "<span>" . "Sous le projet: <a href='projet.php?idProjet=" . $idp . "'>". $row["nomProjet"]."</a></span>";
			echo "<br/><br/>";
			echo "<span>" . "Objet: " .$row["objet"] . "</span>";
			echo "<br/><br/>";	
			echo "<div class='col-12'><span>" . "Message: " . "<p>" .$row["texte_message"] . "</p>" . "</span></div>";
			echo "<br/><br/><br/><br/><br/>";
			if($row["reponse"] != ""){
				echo "<div class='col-12'><span>" . "Reponse: " . "<p>" .$row["reponse"] . "</p>" . "</span></div>";
				echo "<br/><br/><br/><br/><br/>";
			}
			//met soit les boutons ou affiche une date de réponse
			if( $row["id_etat_message"]==1)
			{
				$_SESSION["message"]=$row["id_etat_message"];
		//button accepter refuser
?>
			
<form method='post' action='../classeGestion/GestionMessages.php' >
	<textarea  class='col-12 minHeight' name="Reponse"></textarea>
	<input type='hidden' name="id_message"  value="<?php echo $row["id_message"] ?>"></input>
	
	<div class='col-12'>
		<input type="radio" name="etat"  value="2" required></input>Accepter
		<input type="radio" name="etat"  value="3" required></input>Refuser
	</div>
 
	<input name='action' class="btn btn-success "   type='submit' value ='Enregistrer'/>
</form>

<?php
			}
			//affiche une date de réponse si la demande est accpeter ou refusé
			else if( $row["id_etat_message"]==2)
			{
				echo "<span>Accepté le :  ". $row["moment_reponse"] ."</span>";
			}
			else if( $row["id_etat_message"]==3)
			{
				echo "<span>Refusé le :  ". $row["moment_reponse"] ."</span>";
			}		
			
			echo "<br/></div></div>";
			}
	}
?>