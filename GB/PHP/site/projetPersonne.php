<?php
/**
    Fichier : projetPersonne.php
    Auteur : Pietro Primo
     Fonctionnalité : Permet d'afficher les données de la vue et 
					d'envoyer les informations éa la classe gestion
    Date : 17 avril 2017
 
    Vérification :
    Date                   Nom                    Approuvé
    ========================================================= 
    23 avril 2017        Pietro Primo             OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                Nom                     Description
    =========================================================
    17 avril 2017       Pietro Primo            Création de tous les fonctionnalitées de base
	19 avril 2017       Maxime Proulx           Création de la base avec ajout des categorie à la BD
	20 avril 2017       Boris Zoretic           Création de toute les fonctionnalitées de la vue
	22 avril 2017       Pietro Primo            Ajustement de certaine fonctionnalitées
	24 avril 2017		Pietro Primo			Changement de l'affichage
	29 avril 2017		Boris Zoretic			Validation formulaire (regex et message erreur)
	30 avril 2017		Boris Zoretic			Suppression de tous les "styles" (remplacé par des classes)
    **/
	session_start();
	require_once("../controlleur/ConnectionBD.php");
	$_SESSION["currentPage"] = "projet";
	
	$id = $conn->query("SELECT id_employe_projet FROM employe_projet WHERE id_employe = " . $_GET['idEmploye'] . " AND id_projet =" . $_GET['idProjet'] . " ");

	$idNew = $id->fetch_assoc();
	$_SESSION["idProjetPersonne"] = $idNew["id_employe_projet"];
	$result = $conn->query("SELECT * , e.nom as nomEmploye, p.nom as nomProjet FROM employe_projet ep 
							JOIN employe e ON e.id_employe = ep.id_employe 
							JOIN projet p ON p.id_projet = ep.id_projet 
							WHERE ep.id_employe_projet= '" . $idNew["id_employe_projet"] . "' " );
	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){		
			$_SESSION["pp_id_employe"] =  $row["id_employe"];
			$_SESSION["pp_id_projet"]=  $row["id_projet"];
			$_SESSION["pp_total_alloue"]= $row["total_alloue"];
			$_SESSION["pp_nom_personne"]= $row["nomEmploye"] . ", " . $row["prenom"];
			$_SESSION["pp_nom_projet"]= $row["nomProjet"];
		}
	}
?>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"/>
		<?php
		require_once("structure/includes.php");
		?>
		<link rel="stylesheet" type="text/css" href="style/structure.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"/>
		<script src="javascript/staticMenu.js"></script>		
		<script src="javascript/validationFormProjetPersonne.js"></script>	
		<meta charset="UTF-8"/>
		<script>
			function addCategorieDepenseAlloue(){
				if(window.XMLHttpRequest){
					var xmlhttp = new XMLHttpRequest();
				} else {
					var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function(){
					showCategorie();
				};
				xmlhttp.open("POST", "../classeGestion/GestionCategorieAlloue.php?idEmploye=<?php echo $_GET['idEmploye']?>&idProjet=<?php echo $_GET['idProjet']?>", true);
				xmlhttp.send();		
										
			}
		
			function showCategorie(){
				if(window.XMLHttpRequest){
						var xmlhttp = new XMLHttpRequest();
					} else {
						var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function(){
						if(this.readyState == 4 && this.status == 200){
							document.getElementById("vueCategorieDepenseAlloue").innerHTML = this.responseText;
							clearForm();	
						}
					};
					xmlhttp.open("GET", "../classeVue/vueCategorieDepenseAlloue.php?idEmploye=<?php echo $_GET['idEmploye']?>&idProjet=<?php echo $_GET['idProjet']?>", true);
					xmlhttp.send();
				}
				function clearForm() {
					document.getElementById("formAjouter").reset();
				}
		</script>
	</head>

	<body>
		<?php
			require_once("structure/menuHeader.php");
		?>
		<div class="content autoMargin">
			<div>
				<h1> Options de buget pour : <br> <a href="modifierEmploye.php?idEmploye=<?php echo (((($_SESSION["pp_id_employe"])+ 1) * 666 ) - 666);?>"><?php echo $_SESSION["pp_nom_personne"] ?></a> dans le projet <a href="projet.php?idProjet=<?php echo ((($_SESSION["pp_id_projet"]+ 1) * 666 ) - 666);?>"><?php echo $_SESSION["pp_nom_projet"] ?></a>  </h1>
				<div class="col-12 projet">
					<?php
						require_once("../classeVue/vueProjetPersonne.php");
					?>
					
					<br>
					<h2 class="boldList">Liste des catégories de dépenses avec un montant alloué:</h2><br>
					
					<div id="vueCategorieDepenseAlloue">
					
					</div>
					
					
					<iframe id="frameCategorie" name="frameCategorie" class="formFrame"></iframe>
					<form id="formAjouter"  method="post" action="../classeGestion/GestionCategorieAlloue.php?idEmploye=<?php echo $_GET['idEmploye']?>&idProjet=<?php echo $_GET['idProjet']?>" target="frameCategorie">
						<?php
							require_once("../classeVue/vueCategorieDepense.php");
						?> 
						
						
						<button name="ajout" class="btn btn-success btnProjetPersonne" onclick="validerMontantAlloue(this.form.montant);">Enregistrer</button></span><br><br>
					</form>
					
					
				</div>
				
				<div class="paddingTop20 paddingBot20">
					<form id="formDelete" class="textCenter" method="post" action="../classeGestion/GestionEmployeProjet.php?idEmploye=<?php echo $_GET['idEmploye']?>&idProjet=<?php echo $_GET['idProjet']?>" >
					
					<input class="btn btn-success widthAuto" type="submit" value="Enlever <?php echo $_SESSION["pp_nom_personne"] ?> du projet"> </input>
					</form>
					
				</div>

				<div class="col-12">
					<h1 class="textCenter" >Ajouter une categorie de depense
						<span class="info">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
							<span>Utilisé les champs disponnible pour ajouter une catégorie de dépense au système</span>
						</span>
					</h1>
					
					<iframe id="frameCat" name="frameCat" class="formFrame"></iframe>
					<form  id="categorie" class="createEmploye" action="../classeGestion/GestionCategorie.php" method="post" target="frameCat">
						<label for="Nom">Nom:</label><br>
						<label id="erreurNom" class="erreur">Veuillez saisir un nom pour la catégorie de dépense</label>
						<input class="myinput" name="Nom" placeholder="ex: Transport"></input>
						
						<label for="Description">Description:</label><br>
						<label id="erreurDesc" class="erreur">Veuillez saisir une description</label>
						<input class="myinput" name="Description" placeholder="ex: Frais d'essense"></input>
						
						<label id="succes" class="succes">L'enregistrement à été éffectué avec succès</label><br>
						<button name="ajoutCat" class="btn btn-success"  onclick="FormulaireComplet(this.form.Nom, this.form.Description);">Ajouter catégorie</button>
					</form>
				</div>
			</div>	
		</div>
		<footer>
			<span>
				Fait par MAZPI
			</span>
		</footer>
		<script>showCategorie();</script>
	</body>
</html>