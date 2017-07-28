<?php
/**
    Fichier : projets.php
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
    Date                   Nom                    Description
    ========================================================= 
    17 avril 2017        Pietro Primo             Création de tous les fonctionnalitées de base
	19 avril 2017        Maxime Proulx            Création de la base de l'affihcage de la liste des projets
	20 avril 2017        Boris Zoretic            Création de toute les fonctionnalitées de la vue
	22 avril 2017        Pietro Primo          	  Ajustement de certaine fonctionnalitées
	27 avril 2017 		 Boris Zoretic			  Validation formulaire (regex et message erreur)
	28 avril 2017        Pietro Primo          	  Ajustement AngularJS
	30 avril 2017		 Boris Zoretic			  Suppression de tous les "styles" (remplacé par des classes)
    **/
	session_start();
	require_once("../classeGestion/GestionProjet.php");
	
	$_SESSION["currentPage"] = "projet";
	$_SESSION["modifier"] = false;
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
			function addProjet(){
				if(window.XMLHttpRequest){
					var xmlhttp = new XMLHttpRequest();
				} else {
					var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function(){
					//document.write("fun");
					
						showProjet();
						showProjet();
					
				};
				xmlhttp.open("POST", "../classeGestion/GestionProjet.php", true);
				xmlhttp.send();		
										
			}
		
			function showProjet(){
				if(window.XMLHttpRequest){
					var xmlhttp = new XMLHttpRequest();
				} else {
					var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						document.getElementById("vueProjets").innerHTML = this.responseText;
						clearForm();
					}
				};
				xmlhttp.open("GET", "../classeVue/vueProjets.php", true);
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
		<div class="content autoMargin slide">		
			<div>
				<h1 data-toggle="collapse" data-target="#vueProjets" aria-expanded="true" class="">Liste des projets
				</h1>	<br>
							
				<span class="info">
					<i class="fa fa-question-circle" ></i>
						<span>Utilisé les champs disponnible pour effectuer une recherche personnalisé</span>
				</span>
				
				<div id="vueProjets" class="collapse in"></div>
				
				<div class="col-12">
					<h1 class="textCenter" data-toggle="collapse" data-target="#formAjouter" aria-expanded="true" class="">Ajouter un projet au systeme<span class="info">
					<i class="fa fa-question-circle" ></i>
						<span>Entrez les données demandé pour ajouter un projet au système</span>
				</span> </h1>
					
					<iframe id="frameProjet" name="frameProjet" class="formFrame"></iframe>
					<form id="formAjouter" class="createEmploye collapse in" action="../classeGestion/GestionProjet.php" method="post" target="frameProjet">
						<label for="Nom">Nom:</label><br>
						<label id="erreurNom" class="erreur">Veuillez saisir un nom pour le projet</label>
						<input class="myinput" name="Nom" placeholder="ex: Projet1"></input>
						
						<label for="DateDebut">Date début:</label><br>
						<label id="erreurDebut" class="erreur">Veuillez saisir une date de début pour le projet</label>
						<input class="myinput" name="DateDebut" onfocus="(this.type='date')" onblur="if (!this.value) this.type = 'text'" id="date" placeholder="ex: 2017-04-27" type="text" name="date" value=""></input>
						
						<label for="DateFin">Date fin:</label><br>
						<label id="erreurFin" class="erreur">Veuillez saisir une date de fin pour le projet</label>
						<input class="myinput" name="DateFin" onfocus="(this.type='date')" onblur="if (!this.value) this.type = 'text'" id="date" placeholder="ex: 2017-04-29" type="text" name="date" value=""></input>
						
						<label for="Budget">Montant alloué ($):</label><br>
						<label id="erreurBudget" class="erreur">Veuillez saisir un budget pour le projet</label>
						<input class="myinput" name="Budget" type="number" placeholder="ex: 1000"></input>
						
						<label id="succes" class="succes">L'enregistrement à été éffectué avec succès</label><br>
						<button name="ajout" class="btn btn-success" onclick="FormulaireComplet(this.form.Nom, this.form.DateDebut, this.form.DateFin, this.form.Budget);">Enregisrer</button>
					</form>
				</div>
			</div>
		</div>
		
		<?php
			require_once("structure/footer.php");
		?>
		
		<script>showProjet();</script>
	
	</body>
</html>