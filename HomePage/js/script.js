document.addEventListener('DOMContentLoaded', function() {



    const mobileBtn = document.getElementById("mobile-menu"),
        nav = document.querySelector("nav");



    var bool = false;
    mobileBtn.addEventListener("click", () => {
        if (bool == false) {

            nav.classList.add("menu-btn");

            bool = true;
        } else {


            nav.classList.remove("menu-btn");
            bool = false;
        }

    });


}, false);