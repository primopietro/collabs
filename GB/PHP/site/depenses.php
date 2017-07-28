<?php
/**
    Fichier : depense.php
    Auteur : Pietro Primo
    Fonctionnalité : Permet d'afficher les données de la vue et 
					d'envoyer les informations éa la classe gestion
    Date : 17 avril 2017
 
    Vérification :
    Date                   Nom                       Approuvé
    ========================================================= 
    23 avril 2017        Pietro Primo            OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   Nom                       Description
    ========================================================= 
    17 avril 2017       Pietro Primo           Création de tous les fonctionnalitées de base
	20 avril 2017       Maxime Proulx          Création de tous les fonctionnalitées de base
	24 avril 2017		Pietro Primo		   Changement affichage
	26 avril 2017  		Pietro Primo		   boules d'information
	30 avril 2017		Boris Zoretic		   Suppression de tous les "styles" (remplacé par des classes)
    **/
	session_start();
	$_SESSION["currentPage"] = "depense";
	$_SESSION["tri"] = "date";
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
		<meta charset="UTF-8"/>
		<script>
			function triDepense(){
				var btn = document.getElementById("confirmerTri");
				btn.click();
				if(window.XMLHttpRequest){
						xmlhttp = new XMLHttpRequest();
					} else {
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function(){
						if(this.readyState == 4 && this.status == 200){
							showDepense();						
						}
					};
					xmlhttp.open("GET", "../classeVue/vueChangerDepense.php", true);
					xmlhttp.send();
										
			}
		
			function showDepense(){
				if(window.XMLHttpRequest){
						xmlhttp = new XMLHttpRequest();
					} else {
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function(){
						if(this.readyState == 4 && this.status == 200){
							document.getElementById("vueDepense").innerHTML = this.responseText;							
						}
					};
					xmlhttp.open("GET", "../classeVue/vueDepense.php", true);
					xmlhttp.send();
				}

		</script>
	</head>

	<body>

		<?php
		require_once("structure/menuHeader.php");
		?>
		<div class="content autoMargin slide">		
			<div>
				<h1>Liste des dépenses
					<span class="info">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
						<span>Utilisez les tri pour effectuer<br> une affichage customisé</span>
					</span>
				</h1>
				<div class="paddingTop20">
					<h2>Affichage personnalise :<br></h2>
				</div>
				
				<div class="paddingBot10">
					<span>Tri par: &nbsp;</span>
					<iframe class="formFrame" id="noTarget" name="noTarget"></iframe>
					<form method="get" action="../classeVue/vueChangerDepense.php" target="noTarget">
						<select id="selectTri" name="selectTri" onchange="triDepense()">
							<option value="date">Date</option>
							<option value="montant">Montant</option>
							<option value="nomProjet">Nom Projet</option>
						</select>
						<input class="none" type="submit" id="confirmerTri"></input>
					</form>
				</div>
				
				<br>
			</div>
			
			<div>
				<div id="vueDepense">
				</div>
			</div>	
		</div>
		<?php
		require_once("structure/footer.php");
		?>
	<script>showDepense();</script>
	</body>
</html>