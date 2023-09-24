<?php
  include_once "header.php";
  include_once "../../src/includes/DataBaseConn.php";
  include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
  include_once "includes/FonctionMedInfo_inc.php";
  if(!isset($_SESSION)){
    session_start();
}
$Patient=$_SESSION["user_Id"];

$result=getMedId($conn,$Patient);


?>


<section class="Part-Seven">

<?php


if($result!==false){
  $row=mysqli_fetch_assoc($result);
  $Medecin=$row['Staff_Id'];
  $result=GetInfoById($conn,$Medecin);
while($row=mysqli_fetch_assoc($result)){
  $NomMed=$row['user_Nom'];
  $PrenomMed=$row['user_Prenom'];
  $Email=$row['user_Email'];
  $Tel=$row['user_Ntel']; 
}


?>
<CENTER><div class="infoMedecin">

<p class="titre">
    Quelque information sur votre médecin: 
</p>
<p class="description">
      <span>Nom médecin: </span><br><?php echo $NomMed; ?> <br>
      <span>Prénom médecin: </span><br><?php echo $PrenomMed; ?><br>
      <span>Numéro de téléphone de votre médecin: </span><br><?php echo $Tel; ?><br>
      <span>Adresse e-mail de votre médecin: </span><br><?php echo $Email; ?><br>
</p>
</div>
</CENTER>


<?php
}else{
   echo '<p class="Message">Vous n avez pas encore accés a cette interface. (Vous n avez pas encore un médecin)</p>';
}
?>
</section>

<?php
include "footer.php";

?>