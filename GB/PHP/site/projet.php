<?php
/**
    Fichier : projet.php
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
    Date                   Nom                  Description
    ========================================================= 
    17 avril 2017       Pietro Primo            Création de tous les fonctionnalitées de base
	19 avril 2017       Boris Zoretic           Création de tous les fonctionnalitées avec les fonctions
	24 avril 2017 		Pietro Primo			Changement de l'affichage
	27 avril 2017		Boris Zoretic			Validation formulaire (regex et message erreur)
	28 avril 2017       Pietro Primo          	Ajustement AngularJS
	30 avril 2017		Boris Zoretic			Suppression de tous les "styles" (remplacé par des classes)
    **/
	session_start();
	$_SESSION["currentPage"] = "projet";
	
	$id = (($_GET["idProjet"]+ 666)/666 ) - 1;
	$_SESSION["idProjet"] = $id;
	require_once("../controlleur/ConnectionBD.php");
	$result = $conn->query("SELECT * FROM projet WHERE id_projet = " . $id . " " );
	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){		
			$_SESSION["p_id_etat"] =  $row["id_etat_projet"];
			$_SESSION["p_nom"]=  $row["nom"];
			$_SESSION["p_date_debut"]= $row["date_debut"];
			$_SESSION["p_date_fin"] = $row["date_fin"];
			$_SESSION["p_montant_alloue"] = $row["montant_alloue"];		
			$_SESSION["p_montant_utilise"] = $row["montant_utilise"];	
		}
	}
	$_SESSION["modifier"] = true;
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
		<script src="javascript/recherche.js"></script>
		<script src="javascript/validationFormProjets.js"></script>	
		<meta charset="UTF-8"/>
		<script>
			function addEmployeProjet(){
				if(window.XMLHttpRequest){
					var xmlhttp = new XMLHttpRequest();
				} else {
					var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function(){
					//document.write("fun");
					showEmployeProjet();
					showEmployeProjet();
				};
				xmlhttp.open("POST", "../classeGestion/GestionEmployeProjet.php", true);
				xmlhttp.send();		
										
			}
		
			function showEmployeProjet(){
				if(window.XMLHttpRequest){
					var xmlhttp = new XMLHttpRequest();
				} else {
					var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						document.getElementById("vueProjet").innerHTML = this.responseText;
						clearForm();
					}
				};
				xmlhttp.open("GET", "../classeVue/vueProjet.php?idProjet=<?php echo $_GET["idProjet"] ?>", true);
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
			<h1  data-toggle="collapse" data-target="#vueProjet" aria-expanded="true"  class="textCenter paddingTop20 paddingBot20"><b><?php echo $_SESSION["p_nom"] ?></b></h1>
				<div id="vueProjet"  class=" collapse in"></div>
				
				
					<div class="col-12">
				
					<h1 data-toggle="collapse" aria-expanded="false"  data-target="#modif" class="textCenter paddingTop20">Modifier données du projet 
						<span class="info">
							<i class="fa fa-question-circle" aria-hidden="true"></i>
								<span>Cliquez pour afficher l'option de modifier un projet</span>
						</span> 
					</h1>
					<?php
						if($_SESSION["p_id_etat"] == 2){
							echo "<h2 class='textCenter'>(Fini)</h2>";
						}
						elseif($_SESSION["p_id_etat"] == 3){
							echo "<h2 class='textCenter'>(Annulle)</h2>";
						}
					?>
				
				<iframe id="frameProjet" name="frameProjet" class="formFrame"></iframe>
				<form aria-expanded="true" id="modif" class="collapse createEmploye" action="../classeGestion/GestionProjet.php" method="post" target="frameProjet">
					<label for="Nom">Nom:</label><br>
					<label id="erreurNom" class="erreur">Veuillez saisir un nom pour le projet</label>
					<input class="myinput" <?php if($_SESSION["p_id_etat"] != 1)echo "disabled";?> name="Nom" value="<?php echo $_SESSION["p_nom"] ?>"></input>
					
					<label for="DateDebut">Date début:</label><br>
					<label id="erreurDebut" class="erreur">Veuillez saisir une date de début pour le projet</label>
					<input class="myinput" <?php if($_SESSION["p_id_etat"] != 1)		echo "disabled";?>  name="DateDebut" onfocus="(this.type='date')" onblur="if (!this.value) this.type = 'text'" id="date" value="<?php echo $_SESSION["p_date_debut"] ?>" type="text" value=""></input>
					
					<label for="DateFin">Date fin:</label><br>
					<label id="erreurFin" class="erreur">Veuillez saisir une date de fin pour le projet</label>
					<input class="myinput" <?php if($_SESSION["p_id_etat"] != 1)		echo "disabled";?>   name="DateFin" onfocus="(this.type='date')" onblur="if (!this.value) this.type = 'text'" id="date" value="<?php echo $_SESSION["p_date_fin"] ?>" type="text" value=""></input>
					
					<label for="Budget">Montant alloué ($):</label><br>
					<label id="erreurBudget" class="erreur">Veuillez saisir un budget pour le projet</label>
					<input class="myinput" type="number" <?php if($_SESSION["p_id_etat"] != 1)		echo "disabled";?>   name="Budget" value="<?php echo $_SESSION["p_montant_alloue"] ?>"></input>
					
					<label id="succes" class="succes">L'enregistrement à été éffectué avec succès</label><br>
					<button name="ajout" class="btn btn-success" onclick="FormulaireComplet(this.form.Nom, this.form.DateDebut, this.form.DateFin, this.form.Budget);">Enregisrer</button>
					<?php
						if($_SESSION["p_id_etat"] == 1)
						//echo "<input class='btn btn-success' type='submit' value='Enregisrer'/>";
					?>	
				</form>
				</div>
				
				<div class="col-12">
				
					<h1 data-toggle="collapse" aria-expanded="false" data-target="#message" class="textCenter paddingTop20 ">Envoyer un message
						<span class="info">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
							<span>Cliquez pour envoyer une message</span>
						</span>
					</h1>
					
					<?php
						if($_SESSION["p_id_etat"] == 2){
							echo "<h2 class='textCenter'>(Fini)</h2>";
						} else if($_SESSION["p_id_etat"] == 3){
							echo "<h2 class='textCenter'>(Annulle)</h2>";
						}
					?>
					
					<iframe id="frameMessage" name="frameMessage" class="formFrame"></iframe>
					<form id="message" class="createEmploye collapse" action="../classeGestion/GestionNotifications.php" method="post" target="frameMessage">
						<input type='hidden' name="IdProjet"  value="<?php echo "$id" ?>"></input>
						
						<label for="Texte">Message:</label><br>
						<label id="erreurTexte" class="erreur">Veuillez saisir un message à envoyer</label>
						<input class="myinput" name="Texte" placeholder="Texte"></input>
						
						<?php
						if($_SESSION["p_id_etat"] == 1)
							//echo "<input class='btn btn-success' type='submit' value='Envoyer'/>";
						?>	
						<label id="succesTexte" class="succes">L'envoie à été éffectué avec succès</label><br>
						<button name="envoyer" class="btn btn-success" onclick="validerTexte(this.form.Texte);">Envoyer</button>
					</form>
				</div>
				
			
			

			</div>	
		</div>
		<?php
			require_once("structure/footer.php");
		?>
		<script>showEmployeProjet();</script>
	</body>
</html>