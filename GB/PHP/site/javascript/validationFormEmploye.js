/**
    Fichier : validationFormEmploye.js
    Auteur : Boris Zoretic
    Fonctionnalité : fonction de validation pour les formulaires employés
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


function FormulaireComplet(nom, prenom, telephone, courriel, motPasse){
	var test = true;
	
	
	if (nom.value == "") {
		nom.classList.add("active");
		$("#erreurNom").slideDown("slow");
		test = false;
	}  else{
		nom.classList.remove("active");
		$("#erreurNom").slideUp("slow");
	}
	
	if (prenom.value == "") {
		prenom.classList.add("active");
		$("#erreurPrenom").slideDown("slow");
		
		test = false;
	} else{
		prenom.classList.remove("active");
		$("#erreurPrenom").slideUp("slow");
	}
	
	if (telephone.value == "") {
		telephone.classList.add("active");
		$("#erreurTel").slideDown("slow");
		
		test = false;
	} else{
		telephone.classList.remove("active");
		$("#erreurTel").slideUp("slow");
		if(regexTel(telephone)){
			
		} else {
			setTimeout(function(){telephone.focus();}, 1);
			test = false;
		}
	}
	
	if (courriel.value == "") {
		courriel.classList.add("active");
		$("#erreurCourriel").slideDown("slow");
		
		test = false;
	} else{
		courriel.classList.remove("active");
		$("#erreurCourriel").slideUp("slow");
		if(regexCourriel(courriel)){
			
		} else {
			setTimeout(function(){courriel.focus();}, 1);
			test = false;
		}
	}
	if (motPasse.value == "") {
		motPasse.classList.add("active");
		$("#erreurMotPasse").slideDown("slow");
		test = false;
	}  else{
		motPasse.classList.remove("active");
		$("#erreurMotPasse").slideUp("slow");
	}
	
	if(test === true){
		$("#succes").slideDown("slow");
		setTimeout(function(){$("#succes").slideUp("slow");}, 3000);
		setTimeout(function(){addUser();}, 3800);
	}
	
	
	return test;
}

function validerMotPasse(motPasse){
	var test = true;
	
	if (motPasse.value == "") {
		motPasse.classList.add("active");
		$("#erreurMotPasse").slideDown("slow");
		test = false;
	}  else{
		motPasse.classList.remove("active");
		$("#erreurMotPasse").slideUp("slow");
		
	}
}

function regexTel(val){
	var telRegex = document.getElementById("telRegex");
	
	if (val.value != "" && !/(^[0-9]{3}[0-9]{3}[0-9]{4}$)/.test(val.value)) {  
		val.classList.add("active");
		$(".myinput.active").css("color","red");
		$("#erreurTel").slideUp("slow");
		setTimeout(function(){$("#telRegex").slideDown("slow");}, 700);
		
		return false;
	} else{
		val.classList.remove("active");
		$(".myinput").css("color","#36b798");
		$("#telRegex").slideUp("slow");
		
		return true;
	}
}

function regexCourriel(val){
	var telRegex = document.getElementById("telRegex");
	
	if (val.value != "" && !/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,})|([0-9]{3}[.][0-9]{3}[.][0-9]{3}[.][0-9]{1,3}))$/.test(val.value)) {
		val.classList.add("active");
		$(".myinput.active").css("color","red");
		$("#erreurCourriel").slideUp("slow");
		setTimeout(function(){$("#regexCourriel").slideDown("slow");}, 700);
	} else{
		val.classList.remove("active");
		$(".myinput").css("color","#36b798");
		$("#regexCourriel").slideUp("slow");
		
		return true;
	}
}