/**
    Fichier : validationFormProjetPersonne.js
    Auteur : Boris Zoretic
    Fonctionnalité : fonction de validation pour les formulaires employés
    Date : 29 avril 2017
 
    Vérification :
    Date                   	Nom                      Approuvé
    ========================================================= 
    28 avril 2017        	Pietro Primo             OUI
    23 avril 2017        	Maxime Proulx            OUI
    23 avril 2017        	Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   	Nom                       Description
    ============================================================= 
	29 avril 2017			Boris Zoretic		      Création des fonction de validation
 
**/


function FormulaireComplet(nom, description){
	var test = true;
	
	
	if (nom.value == "") {
		nom.classList.add("active");
		$("#erreurNom").slideDown("slow");
		test = false;
	}  else{
		nom.classList.remove("active");
		$("#erreurNom").slideUp("slow");
	}
	
	if (description.value == "") {
		description.classList.add("active");
		$("#erreurDesc").slideDown("slow");
		
		test = false;
	} else{
		description.classList.remove("active");
		$("#erreurDesc").slideUp("slow");
	}
	
	if(test === true){
		$("#succes").slideDown("slow");
		setTimeout(function(){$("#succes").slideUp("slow");}, 3000);
		setTimeout(function(){addCategorieDepenseAlloue();}, 3800);
	}
	
	
	return test;
}

function validerBudget(budget){
	var test = true;
	
	if (budget.value == "") {
		budget.classList.add("active");
		$("#erreurBudget").slideDown("slow");
		test = false;
	}  else{
		budget.classList.remove("active");
		$("#erreurBudget").slideUp("slow");
	}
	
	
	if(test === true){
		setTimeout(function(){$("#succesBudget").slideDown("slow");}, 800);
		
		setTimeout(function(){$("#succesBudget").slideUp("slow");}, 3800);
	}
}

function validerMontantAlloue(montant){
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
		setTimeout(function(){$("#succesMontant").slideDown("slow");}, 800);
		
		setTimeout(function(){$("#succesMontant").slideUp("slow");}, 3800);
		setTimeout(function(){addCategorieDepenseAlloue();}, 4600);
	}
}
