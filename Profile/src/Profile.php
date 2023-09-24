<?php 
  if(!isset($_SESSION)){
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styleProfile.css?version=9" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Fontcss/all.min.css">
    <title>Profile</title>
  </head>
  <body>

  <?php 
         include_once "../../src/includes/DataBaseConn.php";
         $current_user=$_SESSION["user_Id"];

         $sql="SELECT * FROM users WHERE user_Id = '$current_user'";
         $gotResults=mysqli_query($conn,$sql);

         if($gotResults){
           if(mysqli_num_rows($gotResults)>0){
             while($row=mysqli_fetch_array($gotResults)){
               $UserType=$row['user_Type'];
             }
            }
            }

            if($UserType==="patient"){

              echo "
              <div class='go-back'>
                <a href='../../PagePatient/src/PagePatient.php'><i class='fas fa-chevron-left'></i></a>
              </div>
              ";

            }elseif($UserType==="Medecin"){
              echo "
              <div class='go-back'>
                <a href='../../PageMedecin/src/PageMedecin.php'><i class='fas fa-chevron-left'></i></a>
              </div>
              ";
            }
?>
    <?php include_once "ProfilePic.php";?>

    <!--TITRE-->
    <div class="titre">
      <p class="title" align="center">Informations personnelles</p>
      <h5 class="sous-title">
        Informations de base utilisées sur nos services
      </h5>
    </div>

    <!--FORM PROFILE-->
    <section class="form-Profile">
      <?php include_once "../src/Parametres.php";?>
    </section>
  </body>
</html>
