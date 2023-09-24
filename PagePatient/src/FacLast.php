<?php
  include "header.php";

  if(!isset($_SESSION)){
    session_start();
    
  }

    $Patient=$_SESSION["user_Id"];

  
include_once "../../src/includes/DataBaseConn.php";
include_once "includes/FonctionFacLast_inc.php";
include_once "../../PageAdmin/src/includes/FonctionFacture_inc.php";
                
?>

<section class="Part-Six">

<?php if(FacExists($conn,$Patient)==true){?>
<div class="Liste-Factures-container" id="ListeFacturesContainer">
          <p>Historique des factures</p>
         <ul>
         <?php
                $result=ShowHistoriqueFactures($conn,$Patient);
                
                while($row=mysqli_fetch_assoc($result)){
                  $Facture_Id=$row['Facture_Id'];
                  $Facture_Date=$row['Facture_Date'];
                 ?>
                 <a class="l1" title='Voir facture' href='FacLast.php?OP=Show&Facture=<?php echo $Facture_Id;?>'><li class="list1">
                   <?php 
                   echo "Facture <br/> ".$Facture_Date;
                   ?>
                  </li></a>
                
                 <?php
                }
          ?>
          </ul>
</div>

<?php if(isset($_GET['OP'])){

    if($_GET['OP']=="Show"){

      
      $Facture_Id=$_GET['Facture'];
      $result=GetInfoFac($conn,$Facture_Id);
      while($row=mysqli_fetch_assoc($result)){
        $FDate=date(' d-m-Y ', strtotime($row['Facture_Date']));
        $Year=date('Y', strtotime($row['Facture_Date']));
        $UDN=date(' d-m-Y ', strtotime($row['Patient_DateNaiss']));
        $IdU=$row['Patient_Id'];
        $SN=$row['Patient_Seances'];
        $SP=$row['Seance_Prix'];
        $FS=$row['Frais_Soins'];
        $FM=$row['Facture_Montant'];
      }
    
  ?>

    <div class="show-facture" id="show-facture">
            <p class="title-fact">FACTURE <?php echo $Facture_Id." ".$FDate;?> , PATIENT <?php echo $Nom." ".$Prenom;?>.</p>
            
            <div class="facture">
              
                <p class="first">Fait à ALGER, le : <?php echo $FDate;?> </p>
                <p class="second">Facture N° : <?php echo "FP".$Facture_Id;?><br>
                Facture des séances de dialyse de l'an <?php echo $Year;?></p>
                <hr>

                <p class="third">NOM ET PRENOM:  <?php echo $Nom." ".$Prenom;?><br>
                DATE DE NAISSANCE:  <?php echo $UDN;?> <br>
                Patient N°:  <?php echo $IdU;?>
                </p>
               
                <table style="boder:solid 1px black;table-layout: fixed; width: 100%">
                    <colgroup>
                    <col style="width: 10%">
                    <col style="width: 10%">
                    <col style="width: 10%">
                    <col style="width: 10%">
                    <col style="width: 10%">
                    </colgroup>
                    <thead>
                      <tr>
                        <th>Date Facture</th>
                        <th>Nombre de séances</th>
                        <th>Prix de la séance (DA)</th>
                        <th>Frais soins additionnels (DA)</th>
                        <th>Montant (DA)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo $FDate;?></td>
                        <td><?php echo $SN;?></td>
                        <td><?php echo $SP;?></td>
                        <td><?php echo $FS;?></td>
                        <td><?php echo $FM;?></td>
                      </tr>
                    </tbody>
                    </table>

                    <p class="fourth">Signature et cachet du directeur: <br> <span>Boualouache lamia </span></p>


            </div>
          </div>
          <style>
                @media (min-width: 650px) {
                    .Part-Six {
                       
                            display: grid;
                            grid-template-columns: 49.5% 49.5%;
                            grid-gap: 1%;
                        
                        
                    }
                  }
              </style>
<?php
} }}else{

  echo '<p class="Message">Aucune facture trouvé pour l instant.</p>';
}
?>
 
</section>




  
<?php
include "footer.php";
?>