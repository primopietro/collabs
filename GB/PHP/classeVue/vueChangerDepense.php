<?php
/**
    Fichier : vueChnagerDepense.php
    Auteur : Boris Zoretic  Pietro Primo
    Fonctionnalité : Permet de changer le type de tri fait pour les depenses
    Date : 20 avril 2017
 
    Vérification :
    Date                   Nom                    Approuvé
    ========================================================= 
    23 avril 2017        Pietro Primo             OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   Nom                       Description
    ========================================================= 
	20 avril 2017          Boris Zoretic         	 Création de toute les fonctionnalitées de la vue

    **/
	session_start();
	$_SESSION["tri"] =  $_GET["selectTri"];
?>