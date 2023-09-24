<?php
  include "header.php";
  
  if(!isset($_SESSION)){
    session_start();
    }
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
                    .Picture{
                    background:url('<?php echo "../../Profile/src/".$source; ?>') no-repeat;
                    
                }
                </style>
                <?php
                //echo "<img class='avatar' src='$source'>";
                
    
            }else {
               
                
                $source="../../media/avataravatar.svg";
                ?>
                <style>
                    .Picture{
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
<section class="wrap-all">
    <a href="../../Profile/src/Profile.php" class="one">
        <p class="text">Voir profile</p>
        <div class="Picture"></div>
        <p class="info"><span>Username  : </span><?php echo $Username; ?><br>
        <span>Nom  : </span><?php echo $Nom; ?><br>
        <span>Prénom  : </span><?php echo $Prenom; ?><br>
        </p>
        <p class="description">Vous pouvez consulter votre profil et modifier vos informations personnelles</p>
        
    </a>
    <a href="OrdonnancePatients.php" class="two">
    <p class="text">Voir Ordonnances des patients</p>
    <i class="fas fa-briefcase-medical"></i>
    <p class="info">Vous pouvez gérer , créer , supprimer et consulter les ordonnances d'analyses et de traitements de vos patients.</p>
    
    </a>
    <a href="ProfilesPatients.php" class="three">
      <p class="text">Voir seances de dialyse</p>
      <p class="description">vous trouverez ici les horraires de vos séances de dialyse et les informations de chaque patients</p>
      <i class="far fa-calendar-check"></i>
    </a>
    <a href="RegimePatients.php" class="four">
      <div class="text">gérer régime des patients</div>
      <p class="description"> vous pouvez ajouter ,supprimer des aliments autorisés et non-autorisé pour vos patients.</p>
      <i class="fas fa-utensils"></i>
      
    </a>
    <a href="FPLast.php" class="five">
    <div class="text">ma fiche de paie</div>
    <div class="info">Vous trouverez votre derniere fiche de paie ici</div>
    <i class="fas fa-hand-holding-usd"></i>   
      
    </a>
    <a href="GestionOperations.php" class="six">
    <p class="text">gérer opérations patients</p>
    <p class="info">Vous pouvez voir la progression du poids et tension de la derniere semaine de chaque patients ainsi que l'historique des opérations faites</p>
    <img src="../../media/Group.svg" alt="chart">
    </a>
</section>
<?php
include "footer.php";
?>




<style>

.Picture {
  

  background-size:100% 100%;
  overflow:hidden;
  
}
</style>