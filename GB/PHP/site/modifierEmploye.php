<?php
/**
    Fichier : modifierEmploye.php
    Auteur : Pietro Primo
     Fonctionnalité : Permet d'afficher les données de la vue et 
					d'envoyer les informations éa la classe gestion
    Date : 17 avril 2017
 
    Vérification :
    Date                   	Nom                      Approuvé
    ========================================================= 
    23 avril 2017        	Pietro Primo             OUI
    23 avril 2017        	Maxime Proulx            OUI
    23 avril 2017        	Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   	Nom                    Description
    ========================================================== 
    17 avril 2017       	Pietro Primo           Création de tous les fonctionnalitées de base
	18 avril 2017       	Pietro Primo   		   Création de toute les fonctionnalitées de la vue
	24 avril 2017       	Pietro Primo   		   Modification style / structure
	27 avril 2017			Boris Zoretic		   Validation formulaire (regex et message d'erreur)
	30 avril 2017			Boris Zoretic		   Suppression de tous les "styles" (remplacé par des classes)
    **/
	/*if(isSet($_SESSION)){
		session_unlink();
		session_destroy();
	}*/
	session_start();
	$_SESSION["currentPage"] = "employe";
	
	$id = (($_GET["idEmploye"]+ 666)/666 ) - 1;
	$_SESSION["idModifieEmp"] = $id;
	
	require_once("../controlleur/ConnectionBD.php");
	$result = $conn->query("SELECT * FROM employe WHERE id_employe = " . $id . " " );
	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){		
			$_SESSION["m_e_nom"] =  $row["nom"];
			$_SESSION["m_e_prenom"]=  $row["prenom"];
			$_SESSION["m_e_courriel"]= $row["courriel"];
			$_SESSION["m_e_motPasse"] = $row["mot_passe"];
			$_SESSION["m_e_telephone"] = $row["telephone"];		
			$_SESSION["m_e_etat"] = $row["id_etat_employe"];	
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
		<script src="javascript/staticMenu.js"></script>
		<script src="javascript/validationFormEmploye.js"></script>			
	<?php
		require_once("structure/menuHeader.php");
		?>
	<meta charset="UTF-8"/>
	<script>
		function desactiverEmploye(){
			var btn =  document.getElementById("modifEmploye");
			btn.click();
		}
	</script>
	</head>

	<body>
		<?php
			require_once("structure/menuHeader.php");
		?>
		
		<div class="content autoMargin">
			<div>
				<h1 class="textCenter">Changer donnees d'un employe<span class="info">
					<i class="fa fa-question-circle" aria-hidden="true"></i>
						<span>Modifiez les données d'un employé </span></h1>
					
				<div class="col-12">
					<iframe id="frameEmploye" name="frameEmploye" class="formFrame"></iframe>
					<form class="createEmploye"  action="../classeGestion/GestionEmploye.php" method="post" target="frameEmploye">
						<label for="Nom">Nom:</label><br>
						<label id="erreurNom" class="erreur">Veuillez saisir un nom pour l'employé</label>
						<input class="myinput" name="Nom" value="<?php echo $_SESSION["m_e_nom"] ?>"></input> 
						
						<label for="Prenom">Prénom:</label><br>
						<label id="erreurPrenom" class="erreur">Veuillez saisir un prénom pour l'employé</label>
						<input class="myinput" name="Prenom" value="<?php echo $_SESSION["m_e_prenom"] ?>"></input>
						
						<label for="Telephone">Téléphone:</label><br>
						<label id="erreurTel" class="erreur">Veuillez saisir un numéro de téléphone pour l'employé</label>
						<label id="telRegex" class="erreur">ex: 8195829971</label>
						<input class="myinput" name="Telephone" value="<?php echo $_SESSION["m_e_telephone"]  ?>" onblur="regexTel(this.form.Telephone)"></input>
						
						<label for="Courriel">Courriel:</label><br>
						<label id="erreurCourriel" class="erreur">Veuillez saisir un courriel pour l'employé</label>
						<label id="regexCourriel" class="erreur">ex: example@hotmail.com</label>
						<input class="myinput" name="Courriel" value="<?php echo $_SESSION["m_e_courriel"] ?>" onblur="regexCourriel(this.form.Courriel)"></input>
						
						<label for="MotPasse">Mot de passe:</label><br>
						<label id="erreurMotPasse" class="erreur">Veuillez saisir un mot de passe pour l'employé</label>
						<input class="myinput" name="MotPasse" value="<?php echo $_SESSION["m_e_motPasse"] ?> " ></input>
						
						<label id="succes" class="succes">L'enregistrement à été éffectué avec succès</label><br>
						<button name="Enregisrer" class="btn btn-success"  onclick="FormulaireComplet(this.form.Nom, this.form.Prenom, this.form.Telephone, this.form.Courriel, this.form.MotPasse);">Enregisrer modifications</button>
					</form>
				</div>
				
				<?php
					if($_SESSION["m_e_etat"] == 1){
						echo "<a onclick='desactiverEmploye()' href=#>Desactiver employe <i class='fa fa-times' aria-hidden='true'></i></a>	" ;			
					}
					else{
						echo "<a onclick='desactiverEmploye()' href=#>Activer employe <i class='fa fa-check' aria-hidden='true'></i></a>" ;	
					}
				?>
			</div>	
			
			<form  action="../classeGestion/GestionEmploye.php" method="post" >
				<input name="btnEtat" id="modifEmploye" class="paddingBot20 none" type="submit">
				</input>
			</form>
		</div>
		<?php
			require_once("structure/footer.php");
		?>

	</body>
</html>