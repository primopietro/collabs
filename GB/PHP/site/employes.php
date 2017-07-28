<?php
/**
    Fichier : depense.php
    Auteur : Pietro Primo
    Fonctionnalité : Permet d'afficher les données de la vue et 
					d'envoyer les informations à la classe gestion

    Date : 17 avril 2017
 
    Vérification :
    Date                   	Nom                      Approuvé
    ========================================================= 
    23 avril 2017        	Pietro Primo             OUI
    23 avril 2017       	Maxime Proulx            OUI
    23 avril 2017        	Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   	Nom                    Description
    ========================================================== 
    17 avril 2017       	Pietro Primo           Création de tous les fonctionnalitées de base
	18 avril 2017       	Pietro Primo           Création de tous les fonctionnalitées de base
	24 avri  2017			Pietro Primo		   Modification formulaire / affichage
	26 avril 2017  			Pietro Primo		   Bugfix + boules d'information
	26 avril 2017			Boris Zoretic		   Validation formulaire (regex et message erreur)
	28 avril 2017      		Pietro Primo           Ajustement AngularJS
	30 avril 2017			Boris Zoretic 		   Suppression de tous les "styles" (remplacé par des classes)
    **/
	session_start();
	require_once("../classeGestion/GestionEmploye.php");
	
	$_SESSION["currentPage"] = "employe";
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
		<script src="javascript/validationFormEmploye.js"></script>		
		<meta charset="UTF-8"/>
		<script>
			function addUser(){
				if(window.XMLHttpRequest){
					var xmlhttp = new XMLHttpRequest();
				} else {
					var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function(){
					
					for(var i=0;i<200;++i){
						showUser();
					}
				};
				xmlhttp.open("POST", "../classeGestion/GestionEmploye.php", true);
				xmlhttp.send();		
			}
		
			function showUser(){
			if(window.XMLHttpRequest){
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						document.getElementById("accordion").innerHTML = this.responseText;
						clearForm();	
					}
				};
				xmlhttp.open("GET", "../classeVue/vueEmploye.php", true);
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
				
				<h1  data-toggle="collapse" data-target="#accordion" aria-expanded="true" class="" >Liste des employes<span class="info">
					<i class="fa fa-question-circle" ></i>
						<span>Cliquez sur le titre pour afficher ou <br> cacher la liste d'employés</span>
				</span></h1>
				<span class="info">
					<i class="fa fa-question-circle"></i>
						<span>Utilisez les champs disponibles pour <br>effectuer une recherche personalisé</span>
				</span>
				<div  class="panel-group collapse in" id="accordion">

				</div>

				<div class="col-12">
					
					<h1 data-toggle="collapse" data-target="#divForm" aria-expanded="true" class="textCenter">
					Ajouter un employe au systeme<span class="info">
					<i class="fa fa-question-circle" ></i>
						<span>Cliquez sur le titre pour afficher le<br> formulaire d'inscription pour un <br>nouveau employé</span>
					</span>
					</h1>
					
					<div id="divForm" aria-expanded="true" class="collapse in">
						<iframe id="frameEmploye" name="frameEmploye" class="formFrame"></iframe>
						<form id="formAjouter"   class="createEmploye " method="post"  action="../classeGestion/GestionEmploye.php" target="frameEmploye">
							<div class="form-group">
								<label for="Nom">Nom:</label><br>
								<label id="erreurNom" class="erreur">Veuillez saisir un nom pour l'employé</label>
								<input class="myinput" name="Nom" placeholder="ex: Zoretic">
								</input> 
							</div>	
							<div class="form-group">
								<label for="Prenom">Prénom:</label><br>
								<label id="erreurPrenom" class="erreur">Veuillez saisir un prénom pour l'employé</label>
								<input class="myinput" name="Prenom" placeholder="ex: Bob">
							</input>
							</div>	
							<div class="form-group">
								<label for="Telephone">Téléphone:</label><br>
								<label id="erreurTel" class="erreur">Veuillez saisir un numéro de téléphone pour l'employé</label>
								<label id="telRegex" class="erreur">ex: 8195829971</label>
								<input class="myinput" name="Telephone" placeholder="ex: 8195829971" onblur="regexTel(this.form.Telephone)">
							</input>
							</div>	
							<div class="form-group">
								<label for="Courriel">Courriel:</label><br>
								<label id="erreurCourriel" class="erreur">Veuillez saisir un courriel pour l'employé</label>
								<label id="regexCourriel" class="erreur">ex: example@hotmail.com</label>
								<input class="myinput" name="Courriel" placeholder="ex: bob@hotmail.com" onblur="regexCourriel(this.form.Courriel)">
								</input>
							</div>	
							
							<input class="none" name="MotPasse" value="password"></input>
							
							<label id="succes" class="succes">L'enregistrement à été éffectué avec succès</label><br>
							<button name="Enregisrer" class="btn btn-success"  onclick="FormulaireComplet(this.form.Nom, this.form.Prenom, this.form.Telephone, this.form.Courriel, this.form.MotPasse);">Enregisrer </button>
						</form>
					</div>
				</div>
				

			</div>	
		</div>
		<?php
			require_once("structure/footer.php");
		?>
	<script>showUser();</script>
	</body>
</html>