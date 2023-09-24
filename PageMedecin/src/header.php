<?php 
  if(!isset($_SESSION)){
    session_start();
    
}
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styleMedecin.css?v=39" />
    <title>Page Médecin</title>
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
          <a class="link" href="#">Votre Profil</a>
          </li>

          <li class="element" id="Two">
          <i class="fas fa-procedures"></i>  
          <a class="link" href="#">Profiles des patients Afféctés</a>
          </li>

          <li class="element" id="Three">
          <i class="fas fa-prescription-bottle"></i>
          <a class="link" href="#">Gérer les ordonnances des patients</a>
          </li>

          <li class="element" id="Four">
          <i class="fas fa-carrot"></i> 
          <a class="link" href="#">Régimes alimentaires des patients</a>
          </li>

          <li class="element" id="Five">
          <i class="fas fa-chart-line"></i>      
          <a class="link" href="#">Gestion d'opérations de dialyse</a>
          </li>

          <li class="element" id="Six">
          <i class="fas fa-file-invoice-dollar"></i>  
          <a class="link" href="#">L'historique des fiches de paie </a>
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
<!--

    //////////////////////////////////////////////////////////////////////
    -->

    <div class="main">
      <div class="PageType">
        <p>Médecin : <span><?php echo $Nom." ".$Prenom;?></span></p>
      </div>
      <a title="Home Page" id="Home" class="Home"><i class="fas fa-home"></i></a>
      
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


