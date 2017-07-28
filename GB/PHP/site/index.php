<?php
/**
    Fichier : index.php
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
	17 avril 2017       Pietro Primo           Création de tous les fonctionnalitées de base
	17 avril 2017       Pietro Primo           Création de tous les fonctionnalitées de base
 
    **/
	session_start();
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
	</head>

	<body>
		<div class="bgLogin">
		</div>
		<div class="autoMargin loginScreen">
			<h1> Connexion </h1>
			<?php
			 if(isSet($_SESSION["message"])){
				 echo "<h3>Données pas bonnes, essayer à nouveau.</h3>"	;			 
			 }
			 else if(isSet($_SESSION["id_employe"]) || isSet($_SESSION["nom"])){				 
				header("Location: employes.php");
				exit();
			 }
			?>
			<form class="login"  action="../login.php" method="post">
				<input type="email" name="courriel" placeholder="example@courriel.com"/>

				<input type="password" name="mot_passe" placeholder="********"/>

				<input class="send" type="submit" value="Envoyer"/>
			</form>
		</div>

	</body>
</html>