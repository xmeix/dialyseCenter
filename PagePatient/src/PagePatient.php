<?php
  include "header.php";
  
  if(!isset($_SESSION)){
    session_start();
    }
 //-///////////////////////////////////////////////////////////////-->
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
<!--///////////////////////////////////////////////////////////////-->
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
    <a href="LastOrd.php" class="two">
    <p class="text">Voir Ordonnances</p>
    <i class="fas fa-pills"></i>
    <p class="info">Vous pouvez consulter votre dernieres ordonnances d'analyses et de traitements</p>
    
    </a>
    <a href="Emplois.php" class="three">
      <p class="text">Voir emplois </p>
      <p class="description">vous trouverez ici les horraires de vos séances de dialyse</p>
      <i class="far fa-calendar-check"></i>
    </a>
    <a href="RegimePrescrit.php" class="four">
      <div class="text">Voir régime</div>
      <p class="description">vous trouverez ici les aliments autorisés par votre médecin ainsi que les aliments non autorisé.</p>
      <i class="fas fa-hamburger"></i>
      
    </a>
    <a href="FacLast.php" class="five">
    <div class="text">Voir Facture</div>
    <div class="info">Vous pouvez voir votre derniere facture</div>
    <i class="fas fa-search-dollar"></i>
   
      
    </a>
    <a href="OpInfo.php" class="six">
    <p class="text">Voir statistique opérations </p>
    <p class="info">Vous pouvez voir la progression de votre poids et tension de la derniere semaine</p>
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