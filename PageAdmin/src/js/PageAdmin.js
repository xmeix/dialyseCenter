document.addEventListener('DOMContentLoaded', function() {
    // do stuff here


    const sidebar = document.getElementById("side-bar"),
        menuBtn = document.getElementById("Menubtn"),
        logo = document.getElementById("logo");

    var link = document.getElementsByClassName("link"),
        element = document.getElementsByClassName("element");

    var bool = false;

    menuBtn.addEventListener("click", () => {
        if (bool == false) {
            sidebar.style.width = "370px";
            logo.style.display = "initial";

            for (var i = 0; i < link.length; i++) {
                link[i].style.display = "initial";
            }

            for (var i = 0; i < element.length; i++) {
                element[i].style.width = "380px";
                element[i].style.borderRadius = "0px 40px 40px 0px";
            }

            bool = true;
        } else {
            sidebar.style.width = "60px";
            logo.style.display = "none";

            for (var i = 0; i < link.length; i++) {
                link[i].style.display = "none";
            }

            for (var i = 0; i < element.length; i++) {
                element[i].style.width = "60px";
                element[i].style.borderRadius = "50px";
            }

            bool = false;
        }
    });



    //SHOW HIDE MENU PATIENT-------------------------------------------------
    /* function showHidePatientMenu($i) {


      const patientMenu = document.getElementById("patientMenu");
      //patientMenu.innerHTML=$i;
      if (patientMenu.style.display != "initial") 
      {
        $Current=$i;
        patientMenu.style.display = "initial";
      }else {
        if($Current!=$i){
          if (patientMenu.style.display != "initial") 
          {
              $Current=$i;
              patientMenu.style.display = "initial";
           }
          
        }else{
            patientMenu.style.display = "none";
          }

      }

  }*/

    //SHOW AND HIDE FUNCTIONS INTERFACE FROM MENU OFC 
    //ONCE YOU CLICK ON AN ICONE IN THE MENU OR A BOX IN THE MENU , WE SEE ITS INTERFACE

    /*function GotoListeDesPatients(){
    var ElementP =  document.getElementById('wrapElements');
    var WrapListPat = document.getElementById('WrapListPat');
    
    console.log("HERE");
        if(ElementP.style.visibility!="hidden" && WrapListPat.style.visibility!="hidden"){

      ElementP.style.visibility="hidden";
      WrapListPat.style.visibility="hidden";

    }else{

      ElementP.style.visibility="visible";
      WrapListPat.style.visibility="visible";
    }
  
}*/


    var BtnTwo = document.getElementById('Two');
    var BtnSix = document.getElementById('Six');
    var BtnOne = document.getElementById('One');
    var BtnThree = document.getElementById('Three');
    var BtnFour = document.getElementById('Four');
    var BtnFive = document.getElementById('Five');
    var BtnSeven = document.getElementById('Seven');
    var BtnEight = document.getElementById('Eight');
    var BtnNine = document.getElementById('Home');



    BtnNine.addEventListener("click", () => {

        window.open("../../HomePage/src/HomePage.php", '_blank');

    });
    BtnEight.addEventListener("click", () => {

        window.location.replace("GestionAffectation.php");

    });
    BtnSeven.addEventListener("click", () => {

        window.open("../../src/PageSignUp.php", '_blank');

    });

    BtnThree.addEventListener("click", () => {

        window.location.replace("ListeStaff.php");

    });

    BtnOne.addEventListener("click", () => {

        window.location.replace("PageInscriptionMedecins.php");

    });

    BtnTwo.addEventListener("click", () => {

        window.location.replace("ListePatients.php");

    });

    BtnSix.addEventListener("click", () => {

        window.location.replace("Fourniture.php");


    });

    BtnFour.addEventListener("click", () => {

        window.location.replace("GestionDemEdt.php");


    });

    BtnFive.addEventListener("click", () => {

        window.location.replace("SeancesEdt.php");


    });



    var ifMed = document.getElementById("ifMed");
    var TypeIns = document.getElementById("TypeIns");
    var password = document.getElementById("password");
    var confirmpassword = document.getElementById("confirmpassword");
    var username = document.getElementById("username");
    window.MedInfCheck = function() {
        if (TypeIns.value == "Medecin") {
            ifMed.style.display = "grid";
            password.setAttribute('required', '');
            confirmpassword.setAttribute('required', '');
            username.setAttribute('required', '');
        } else {
            ifMed.style.display = "none";
            password.removeAttribute('required');
            confirmpassword.removeAttribute('required');
            username.removeAttribute('required');
        }
    }

    var siOuiSoins = document.getElementById("si-oui-soins");
    var SoinsAdditionnels = document.getElementById("Soins_additionnels");
    var SoinsPrix = document.getElementById("Soins_prix");

    window.SiOuiCheck = function() {
        if (SoinsAdditionnels.value == "Oui") {
            siOuiSoins.style.display = "grid";
            SoinsPrix.setAttribute('required', '');

        } else {
            siOuiSoins.style.display = "none";
            SoinsPrix.removeAttribute('required');

        }
    }






}, false);