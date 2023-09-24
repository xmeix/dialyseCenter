<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css?ver=9" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../Fontcss/all.min.css">
    <title>Document</title>
  </head>
  <body>


    <div class="general">
        <div id="Sign-Up-Container" class="Sign-Up-Container">
           <div id="display1" class="first-part">
              <img src="../media/Image.svg" alt="image" />
              <p class="text">
                Vous etes deja un membre!
              </p>
              <div class="btn"><button id="sign-in-id">Se connecter</button></div> 
           </div>
        
           <div  id="display2" class="second-part">
            <h1 class="title">Inscription</h1>
            <!--SIGN UP FORM ///////////////////////////////////////////////////////////////////////////////////////////////////-->
            <?php
              include_once "Sign_Up.php";
            ?>


              <!--END SIGN UP FORM ////////   ///////////////////////////////////////////////////////////////////////////////////////////-->
              
              </div>




        <div class="Sign-In-Container">
            <div class="first-part-SI">
              <h1 class="title">Connexion</h1>
              <center><img src="../media/avatar.svg" alt="avatar"></center>
              <center>
              <?php include_once "Sign_In.php" ?>
              </center>
              <p >Suivez nous sur nos comptes</p>
              <div class="social-media">
                <a href="#" class="social-icon">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </div>


            </div>

             <div class="second-part-SI">
              <img src="../media/imag.svg" alt="img2">
              <p class="text">Pas encore un membre!</p>
              <div class="btn"><button id="sign-up-id">S'inscrire</button></div>
            </div>
     </div>
     
    </div>

    <script>

       const sign_in_btn = document.querySelector("#sign-in-id");
       const sign_up_btn = document.querySelector("#sign-up-id");

       const firstpart = document.getElementById("Sign-Up-Container");

       const container1 = document.querySelector("#display2");
       const container2 = document.querySelector("#display1");
    </script>

    <?php
    if(isset($_GET['Error']))
    {
        if(isset($_GET["Page"]))
        {
            echo'<script>

          container1.classList.add("displa");
          container2.classList.add("displa");       
            </script>';
        }
        if($_GET['Error']=="none")
        {
            echo'<script>

          container1.classList.add("displa");
          container2.classList.add("displa");       
            </script>';

            ?>
            <div class="big-cont">
            <div class="AL">
            <a class="close-notif" href="PageSignUp.php?Error=0&Page"><i class="fas fa-times"></i></a>
            <p class="Alert">Inscription effectué avec succés <br>
            vous pouvez vous connecter dés maintenat! :) 
            
            </p>
          </div>
        </div>
            
            
            
            <?php
        }
      }
    ?>

      <script>  sign_up_btn.addEventListener("click", () => {

         container1.classList.remove("displa");
         container2.classList.remove("displa");
       });

       sign_in_btn.addEventListener("click", () => {
        //firstpart.style.animation="Trans 1s ease";
        //firstpart.style.animationFillMode="forwards";
        container1.classList.add("displa");
        container2.classList.add("displa");
       });
       </script>

   </body>
</html>
