<?php
/**
    Fichier : temp.php
    Auteur : Pietro Primo
    Fonctionnalité : Classe temporaire pour les sessions
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
    17 avril 2017       Pietro Primo            Création de tous les fonctionnalitées de base
	28 avril 2017       Pietro Primo          	Changement nom lien
    **/
session_start();
session_destroy();			
header("Location: index.php");
?>
