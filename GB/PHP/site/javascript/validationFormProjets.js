/**
    Fichier : validationFormProjets.js
    Auteur : Boris Zoretic
    Fonctionnalité : fonction de validation pour les formulaires projets
    Date : 27 avril 2017
 
    Vérification :
    Date                   	Nom                      Approuvé
    ========================================================= 
    28 avril 2017        	Pietro Primo             OUI
    23 avril 2017        	Maxime Proulx            OUI
    23 avril 2017        	Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   	Nom                       Description
    ============================================================= 
	27 avril 2017			Boris Zoretic		      Création des fonction de validation
 
**/


function FormulaireComplet(nom, dateDebut, dateFin, budget){
	var test = true;
	
	
	if (nom.value == "") {
		nom.classList.add("active");
		$("#erreurNom").slideDown("slow");
		test = false;
	}  else{
		nom.classList.remove("active");
		$("#erreurNom").slideUp("slow");
	}
	
	if (dateDebut.value == "") {
		dateDebut.classList.add("active");
		$("#erreurDebut").slideDown("slow");
		test = false;
	}  else{
		dateDebut.classList.remove("active");
		$("#erreurDebut").slideUp("slow");
	}
	
	if (dateFin.value == "") {
		dateFin.classList.add("active");
		$("#erreurFin").slideDown("slow");
		test = false;
	}  else{
		dateFin.classList.remove("active");
		$("#erreurFin").slideUp("slow");
	}
	
	if (budget.value == "") {
		budget.classList.add("active");
		$("#erreurBudget").slideDown("slow");
		test = false;
	}  else{
		budget.classList.remove("active");
		$("#erreurBudget").slideUp("slow");
	}
	
	if(test === true){
		$("#succes").slideDown("slow");
		setTimeout(function(){$("#succes").slideUp("slow");}, 3000);
		setTimeout(function(){addProjet();}, 3800);
	}
	
	
	return test;
}

function validerMontant(montant){
	var test = true;
	
	if (montant.value == "") {
		montant.classList.add("active");
		$("#erreurMontant").slideDown("slow");
		test = false;
	}  else{
		montant.classList.remove("active");
		$("#erreurMontant").slideUp("slow");
	}
	
	if(test === true){
		$("#succesMontant").slideDown("slow");
		setTimeout(function(){$("#succesMontant").slideUp("slow");}, 3000);
		setTimeout(function(){addEmployeProjet();}, 3800);
	}
}

function validerTexte(texte){
	var test = true;
	
	if (texte.value == "") {
		texte.classList.add("active");
		$("#erreurTexte").slideDown("slow");
		test = false;
	}  else{
		texte.classList.remove("active");
		$("#erreurTexte").slideUp("slow");
	}
	
	if(test === true){
		$("#succesTexte").slideDown("slow");
		setTimeout(function(){texte.value = "";}, 300);
		setTimeout(function(){$("#succesTexte").slideUp("slow");}, 3000);
	}
}