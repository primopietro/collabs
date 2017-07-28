/**
    Fichier : recherche.js
    Auteur : Maxime Proulx
    Fonctionnalité : fonction de recherche dans un tableau
    Date : 26 avril 2017
 
    Vérification :
    Date                   Nom                       Approuvé
    ========================================================= 
    28 avril 2017        Pietro Primo            OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   Nom                       Description
    ========================================================= 
	26 avril 2017		Maxime Proulx		     Création des fonction de recherche
 
    **/


//recherche pour les projets
		function rechercheNomProjet() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("nom");
          filter = input.value.toUpperCase();
          table = document.getElementById("projetTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
		function rechercheDateProjet() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("date");
          filter = input.value.toUpperCase();
          table = document.getElementById("projetTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
		function rechercheBudgetProjet() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("budget");
          filter = input.value.toUpperCase();
          table = document.getElementById("projetTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
		function rechercheDepenseProjet() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("depense");
          filter = input.value.toUpperCase();
          table = document.getElementById("projetTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
		
		//recherche employe
		function rechercheNomEmploye() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("nom");
          filter = input.value.toUpperCase();
          table = document.getElementById("employeTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
		function recherchePrenomEmploye() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("prenom");
          filter = input.value.toUpperCase();
          table = document.getElementById("employeTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
		function rechercheTelephoneEmploye() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("tel");
          filter = input.value.toUpperCase();
          table = document.getElementById("employeTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
		function rechercheCourielEmploye() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("couriel");
          filter = input.value.toUpperCase();
          table = document.getElementById("employeTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
		
		//recherche employeProjet
		function rechercheNomEmpPro() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("nom");
          filter = input.value.toUpperCase();
          table = document.getElementById("employeProjetTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
		function recherchePrenomEmpPro() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("prenom");
          filter = input.value.toUpperCase();
          table = document.getElementById("employeProjetTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
		function rechercheTelephoneEmpPro() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("tel");
          filter = input.value.toUpperCase();
          table = document.getElementById("employeProjetTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
		function rechercheCourielEmpPro() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("couriel");
          filter = input.value.toUpperCase();
          table = document.getElementById("employeProjetTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
		function rechercheMontantEmpPro() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("montant");
          filter = input.value.toUpperCase();
          table = document.getElementById("employeProjetTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }