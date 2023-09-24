<?php
  include "header.php";
  

  if(!isset($_SESSION)){
    session_start();
}
$Medecin=$_SESSION["user_Id"];


include_once "../../src/includes/DataBaseConn.php";
include_once "includes/FonctionFPLast.php";

 
?>

<section class="Part-Six">

<!--HISTORIQUE FICHE DE PAIE-->
<div class="Historique-fiches-paie">
<?php if(FPExists($conn,$Medecin)===true){?>
        <p>Historique de fiche de paies</p>
         <ul>
         <?php
                include_once "../../PageAdmin/src/includes/FonctionFP_inc.php";
                include_once "../../src/includes/DataBaseConn.php";
                $result=ShowHistoriqueFP($conn,$Medecin);
                while($row=mysqli_fetch_assoc($result)){
                  $FPId=$row['FP_Id'];
                  $FPDate=$row['FP_Date_Creation'];
                  
                  echo "<a class='l1' title='Afficher historique des fiches de paie' href='FPLast.php?OP=Show&FPId=$FPId&StaffId=$Medecin&Staff'><li class='list1'>";
                 ?>
                    <?php 
                   echo "Fiche <br> ".$FPDate;
                   ?>
                  </li></a>
                    
                 
                 <?php
                }
          ?>
          </ul>
          <?php }else echo "<p class='Message'>Vous n'avez pas encore reçu votre premiere fiche de paie, veuillez patienter jusqu'a la fin du mois.</p>";?>


</div>

<?php

          if(isset($_GET['OP'])){
            if($_GET['OP']=="Show"){
                $FStaffId=$_GET['StaffId'];
                $FFPId=$_GET['FPId'];
                $result=GetLastFP($conn,$Medecin,$FFPId);


            while($row=mysqli_fetch_assoc($result)){
                
                            
                            $FNSS=$row['NSS'];
                            $FSfam=$row['Situation_Fam']; 
                            $FDateRec=date('d-m-Y', strtotime($row['Date_Recrutement']));
                            $FFPDate=$row['FP_Date_Creation'];
                            $FSB=$row['Salaire_Base'];
                            $FIEP=$row['IND_EXP_PRO'];
                            $FIN=$row['IND_Nuisances'];
                            $FIDisp=$row['IND_Disponibilite'];
                            $FPanier=$row['Panier'];
                            $FTransport=$row['Transport'];
                            $FRet=$row['Retenue'];
                            $FTotal=$row['Total'];
                            $FStaffNom=$row['user_Nom'];
                            $FStaffPrenom=$row['user_Prenom'];
                            $FStaffId=$Medecin;
                            $FStaffDateNaiss=$row['user_DateNaiss'];
                            $FStaffType=$row['user_Type'];
                            $FMois=date('M', strtotime($row['FP_Date_Creation']));
                            $FYear=date('Y', strtotime($row['FP_Date_Creation']));
            }
              ?>
          <div class="show-FP">
            <p class="title-FiP">Fiche de paie <?php echo $FFPId." ".$FFPDate;?> , employé <?php echo $FStaffNom." ".$FStaffPrenom;?>.</p>
            <div class="FP">
            <p class="first">BULLETIN DE PAIE <span> <?php echo $FMois."-".$FYear; ?> </span>  </p>
            <div class="contain">
                <div class="Employeur">
                    <p>
                    <span> DialyseCenter <br><br>
                        148 Avenue de l'ALN Caroubier <br><br>
                        Alger <br><br>
                        N°CNAS 16 384096 45</span>
                    </p>
                </div>
                <div class="employe-1">
                   <span> NOM & PRENOM:</span>  <?php echo $FStaffNom." ".$FStaffPrenom?><br><br>
                   <span>AFFECTATION:</span>  Caroubier Centre de dialyse <br><br>
                   <span>FONCTION:</span>  <?php echo $FStaffType?><br><br>
                   <span>NUMÉRO DE SÉCURITÉ SOCIALE:</span> <?php echo $FNSS; ?><br>


                </div>
                <div class="employe-2">
                <span> ID EMPLOYÉ:</span> <?php echo $FStaffId;?><br><br>
                <span>DATE RECRUTEMENT:</span> <?php echo $FDateRec;?><br><br>
                <span>SIT. FAMILLE:</span> <?php echo $FSfam;?><br><br>


                </div>
                <div class="signature">
                    
                    <p>Signature et cachet du directeur</p>
                    <br><br><br>
                    <p>LAMIA BOUALOUACHE</p>
                </div>
            </div>

            <table class="TableRub" style="boder:solid 1px black;table-layout: fixed; width: 100%">
                <colgroup>
                        <col style="width: 10%">
                        <col style="width: 10%">
                        <col style="width: 10%">
                        
                        </colgroup>
                        <thead>
                        <tr>
                            <th>Rubrique</th>
                            <th>Versements</th>
                            <th>Retenues</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Salaire de base mensuel</td>
                            <td><?php echo $FSB;?></td>
                            <td>0</td>
                            
                        </tr>
                        <tr>
                            <td>IND.EXP.PROF.</td>
                            <td><?php echo $FIEP;?></td>
                            <td>0</td>
                            
                        </tr>
                        <tr>
                            <td>IND. NUISANCES</td>
                            <td><?php echo $FIN;?></td>
                            <td>0</td>
                            
                        </tr>
                        <tr>
                            <td>IND.Disponibilite</td>
                            <td><?php echo $FIDisp;?></td>
                            <td>0</td>
                            
                        </tr>
                        <tr>
                            <td>Prime panier jour</td>
                            <td><?php echo $FPanier;?></td>
                            <td>0</td>
                            
                        </tr>
                        <tr>
                            <td>Prime transport jour</td>
                            <td><?php echo $FTransport;?></td>
                            <td>0</td>
                            
                        </tr>
                        <tr>
                            <td>Retenues IRG + S/S</td>
                            <td></td>
                            <td><?php echo $FRet;?></td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td>TOTAL</td>
                            <td><?php echo $FTotal;?></td>
                            
                        </tr>
                        
                        </tbody>

                        
            </table> 
            
                     <div class="NET">
                            NET A PAYER : <?php echo $FTotal;?><br>
                    </div>  
                        
            </div> 
                        
          </div>
                
          <style>

              .Part-Six{
                .wrap {
        display: grid;
        grid-template-columns: 50% 50%;}
              }
          </style>

          <?php

            }}
          ?>

</section>




  
<?php
include "footer.php";
?>