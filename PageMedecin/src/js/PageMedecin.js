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


    var BtnTwo = document.getElementById('Two');
    var BtnOne = document.getElementById('One');
    var BtnThree = document.getElementById('Three');
    var BtnFour = document.getElementById('Four');
    var BtnSix = document.getElementById('Six');
    var BtnFive = document.getElementById('Five');



    BtnOne.addEventListener("click", () => {

        window.location.replace("../../Profile/src/Profile.php");

    });

    BtnTwo.addEventListener("click", () => {

        window.location.replace("ProfilesPatients.php");

    });
    BtnThree.addEventListener("click", () => {

        window.location.replace("OrdonnancePatients.php");

    });
    BtnFour.addEventListener("click", () => {

        window.location.replace("RegimePatients.php");

    });
    BtnFive.addEventListener("click", () => {

        window.location.replace("GestionOperations.php");

    });
    BtnSix.addEventListener("click", () => {

        window.location.replace("FPLast.php");

    });

    var BtnNine = document.getElementById('Home');



    BtnNine.addEventListener("click", () => {

        window.open("../../HomePage/src/HomePage.php", '_blank');

    });


}, false);