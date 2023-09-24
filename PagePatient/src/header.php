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
    <link rel="stylesheet" href="../css/stylePatient.css?v=1">
    <title>Page Patient</title>
    <link rel="stylesheet" href="../../Fontcss/all.min.css">
  </head>
  <body>

  
    <div id="side-bar" class="side-bar">
      <div class="logo-container">
        <div class="logo">
          <i id="Menubtn" class="fas fa-bars"></i>
          <a href="#" id="logo" class="logo">Mon <span>Menu</span></a>
        </div>
      </div>
      <div class="menu">
        <ul>
          <li class="element" id="One">
          <i class="fas fa-id-card-alt"></i>  
          <a class="link" href="#">Mon Profil</a>
          </li>

          <li class="element" id="Two">
          <i class="fas fa-file-prescription"></i> 
          <a class="link" href="#">Historique de mes ordonnances</a>
          </li>

          <li class="element" id="Three">
          <i class="fas fa-calendar-times"></i>
          <a class="link" href="#">Emplois du dialyse</a>
          </li>

          <li class="element" id="Four">
          <i class="fas fa-utensils"></i>
          <a class="link" href="#">Regime Prescrit</a>
          </li>

          <li class="element" id="Five">
          <i class="fas fa-procedures"></i> 
          <a class="link" href="#">Information opérations de dialyse</a>
          </li>

          <li class="element" id="Six">
          <i class="fas fa-file-invoice-dollar"></i>
          <a class="link" href="#">Historique de mes factures</a>
          </li>
          <li class="element" id="Seven">
          <i class="fas fa-phone-alt"></i>
          <a class="link" href="#">Contactez votre médecin</a>
          </li>
          
        </ul>
      </div>
    </div>

    
    <?php 
include_once "../../src/includes/DataBaseConn.php";

$Username = $_SESSION['user_Username'];
$Id=$_SESSION['user_Id'];
$sql="SELECT * FROM ImageP WHERE ImageP_UserUsername = '$Username' ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    
        if($row['ImageP_Etat'] == 0)//theres already an image
        {
            $source= $row["ImageP_Url"];
            
            ?>
            <style>
                .wrap-img{
                background:url('<?php echo "../../Profile/src/".$source; ?>') no-repeat;
                
            }
            </style>
            <?php
            //echo "<img class='avatar' src='$source'>";
            

        }else {
           
            
            $source="../../media/avataravatar.svg";
            ?>
            <style>
                .wrap-img{
                 background:url('<?php echo $source; ?>') no-repeat;
                
                }
            </style>
            <?php
            

        }
    


}

$sql="SELECT * FROM users WHERE user_Id = '$Id' ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
  $Nom=$row['user_Nom'];
  $Prenom=$row['user_Prenom'];
}

?>


    <div class="main">
      <a title="Home Page" id="Home" class="Home"><i class="fas fa-home"></i></a>
      
      <a href="PagePatient.php" class="PageType">
        <p>Patient : <span><?php echo $Nom." ".$Prenom;?></span></p>
      </a>
      
      <a href="../../src/includes/LogOut_inc.php" class="Déconnexion">Déconnexion</a>
      <div class="wrap-img">
      </div>
    </div>

<style>

.wrap-img {
  

  
  background-size:100% 100%;
  overflow:hidden;
  
}
</style>

