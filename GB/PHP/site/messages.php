<?php
/**
    Fichier : messages.php
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
	21 avril 2017       Maxime Proulx          Création de tous les fonctionnalitées de base

 
    **/
	session_start();
	$_SESSION["currentPage"] = "notification";
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
				
		//refresh la page et get les notifications
			function showNotification(){
				if(window.XMLHttpRequest){
						xmlhttp = new XMLHttpRequest();
					} else {
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function(){
						if(this.readyState == 4 && this.status == 200){
							document.getElementById("vueNotifications").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("POST", "../classeVue/vueMessages.php", true);
					xmlhttp.send();
					setTimeout(showNotification, 30000);
				}
		</script>
	</head>

	<body>
	<!-- affiche le menu --> 
		<?php
		require_once("structure/menuHeader.php");
		?>
		<!-- affiche les noptifications --> 
		
		<div class="content autoMargin slide">
		
			<div>
				<h1>
		Liste des messages <span class="info">
					<i class="fa fa-question-circle" aria-hidden="true"></i>
						<span>Consultez les messages envoyés <br>par vos employés </span>
					</span>
		</h1>
				<div id="vueNotifications">
				</div>
			</div>
		</div>
		<!-- affiche le footer --> 
		<?php
			require_once("structure/footer.php");
		?>
	<script>showNotification();</script>
	</body>
</html>