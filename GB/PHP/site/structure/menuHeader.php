<?php
/**
    Fichier : vueCategorieDepense.php
    Auteur : Pietro Primo
    Fonctionnalité : Permet d'afficher la liste des categorie de dépense Alloue
    Date : 18 avril 2017
 
    Vérification :
    Date                   Nom                       Approuvé
    ========================================================= 
    23 avril 2017        Pietro Primo            OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   Nom                       Description
    ========================================================= 
	28 avril 2017		Maxime Proulx		     Chnagement nom lien logOut

    **/
?>
<nav class="upperMenu">
	<a href=# class="floatLeft">
		
	</a>
	<span class="upMenuText">Bonjour <?php echo $_SESSION["nom"] . ", " .  $_SESSION["prenom"];	?></span>
	
</nav>

<div class="lowerMenuImg <?php
		if($_SESSION["currentPage"] == "employe"){
		echo "employeBg";
		}
						
		else if($_SESSION["currentPage"] == "projet"){
			echo "projectBg";
		}
					
		else if($_SESSION["currentPage"] == "depense"){
			echo "depenseBg";
		}			
		else if($_SESSION["currentPage"] == "notification"){
		//	echo "Messages";
		}
?>" id="mainBgImg" >
<h1 class="titlePage">
<?php
		if($_SESSION["currentPage"] == "employe"){
			echo "Employés";
		}
						
		else if($_SESSION["currentPage"] == "projet"){
			echo "Projets";
		}
					
		else if($_SESSION["currentPage"] == "depense"){
			echo "Dépenses";
		}			
		else if($_SESSION["currentPage"] == "notification"){
			echo "Messages";
		}
?>
</h1>
</div>
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="330">
  <div class="container-fluid">
    <div class="navbar-header">
        <button id="mobileClose" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar "></span>
          <span class="icon-bar "></span>
          <span class="icon-bar "></span>                        
      </button>
      <a class="navbar-brand" href="#"><i  class="fa fa-cubes icon greenText" aria-hidden="true"> </i>  <span>Gestion Pro</span></a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a class="<?php 				
		if($_SESSION["currentPage"] == "employe"){
			echo "active";
		}
		?>" href="employes.php">Employes</a></li>
          <li><a class="<?php 				
		if($_SESSION["currentPage"] == "projet"){
			echo "active";
		}
		?>" 	
		href="projets.php">Projets</a></li>
          <li><a class="<?php 				
		if($_SESSION["currentPage"] == "depense"){
			echo "active";
		}?>" href="depenses.php">Dépenses</a></li>
           <li><a class="<?php 				
		if($_SESSION["currentPage"] == "notification"){
			echo "active";
		}
		?>" href="messages.php">Messages</a></li>
		
        </ul>
		 <ul class="nav navbar-nav navbar-right">
		<li><a   href="logOut.php<?php	
		if(!isSet($_SESSION["id_employe"])){
			header("Location: logOut.php");
			exit();
		}
	?>">Fermer session</a></li>
     
		</ul>
      </div>
    </div>
  </div>
</nav>    
		