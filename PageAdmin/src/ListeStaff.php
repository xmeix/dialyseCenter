<?php
include "header.php";

include "../../src/includes/DataBaseConn.php";


    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
?>


<section class="Part-three"  id="PartThrees">
<div class="wrap-staff">
<div class="listeStaff">
    <p class="titre-staff">Liste des médecins</p>
    <center><form action="includes/SopS.php" method="post" class="search-Bar">
                  <input type="text" name='searchVM' aria-labeledby="search value" placeholder="search for ...">
                  <center><button type="submit" name="SearchM"><i class="fas fa-search"></i></button>
                  <button type="submit" name="Reload"><i class="fas fa-undo-alt"></i></button>
              </center></center>
    </form>
    <?php

            include_once "../../src/includes/DataBaseConn.php";
            include_once "includes/FonctionStaffList_inc.php";
            $Type="Medecin";
           
            if(!isset($_GET['searchValueM'])){
                $result=RowInfoS($conn,$Type);
                $check="yes";
            
            }else{
                $check="No";
            include_once "includes/FonctionSop.php";
            $searchVM=$_GET['searchValueM'];
            if($searchVM==""){ 
                $result=false;
            }else{
            
                $result=searchForS($conn,$searchVM,$Type);
                }
            
            }
            
            
                if($result!==false){
                    echo "<ul>";
                     while($row=mysqli_fetch_assoc($result)){
                      $StaffId=$row['user_Id'];
                      $StaffNom=$row['user_Nom'];
                      $StaffPrenom=$row['user_Prenom'];
                      $StaffType=$row['user_Type'];
                      

                      echo "<a class='lien1' title='Voir profile' href='StaffOperations.php?StaffId=".$StaffId."'>
                      <li id='patient' class='list-elt'>";
                      echo $StaffNom." ".$StaffPrenom;
                      echo "</li></a>
                      <a class='lien2' title='Supprimer Médecin' href='StaffOperations.php?StaffDelete=".$StaffId."'><i class='fas fa-trash-alt'></i></a>
                      <a class='lien4' title='Voir historique des fiches de paie' href='StaffOperations.php?Function=FP&StaffId=".$StaffId."'><i class='fas fa-money-check'></i></a>
                
                      ";
                      
                 }
                 echo "</ul>";
                }else{
                    if($check=="yes"){
                     echo "<p class='Message'>Pas de médecins inscrits</p>";
                     }else{
                        echo '<p class="error">element pas trouvé</p>';
                     }
                }
                                    

                    ?>
            
</div>
<div class="listeStaff">
    <p class="titre-staff">Liste d'infirmiers</p>
    <center><form action="includes/SopS.php" method="post" class="search-Bar">
                  <input type="text" name='searchVI' aria-labeledby="search value" placeholder="search for ...">
                  <center><button type="submit" name="SearchI"><i class="fas fa-search"></i></button>
                  <button type="submit" name="Reload"><i class="fas fa-undo-alt"></i></button>
              </center></center>
    </form>
    <?php

            include_once "../../src/includes/DataBaseConn.php";
            include_once "includes/FonctionStaffList_inc.php";
            $Type="Infirmier";
           
            if(!isset($_GET['searchValueI'])){
                $result=RowInfoS($conn,$Type);
                $checkI="yes";
            
            }else{
                $checkI="No";
            include_once "includes/FonctionSop.php";
            $searchVI=$_GET['searchValueI'];
            if($searchVI==""){ 
                $result=false;
            }else{
            
                $result=searchForS($conn,$searchVI,$Type);
                }
            
            }

            echo "<ul>";
                if($result!==false){
                     while($row=mysqli_fetch_assoc($result)){
                      $StaffId=$row['user_Id'];
                      $StaffNom=$row['user_Nom'];
                      $StaffPrenom=$row['user_Prenom'];
                      $StaffType=$row['user_Type'];
                      

                      echo "<a class='lien1' title='Voir profile' href='StaffOperations.php?StaffId=".$StaffId."'>
                      <li id='patient' class='list-elt'>";
                      echo $StaffNom." ".$StaffPrenom;
                      echo "</li></a>
                      <a class='lien2' title='Supprimer infirmier' href='StaffOperations.php?StaffDelete=".$StaffId."'><i class='fas fa-trash-alt'></i></a>
                      <a class='lien4' title='Voir historique des fiches de paie' href='StaffOperations.php?Function=FP&StaffId=".$StaffId."'><i class='fas fa-money-check'></i></a>
                
                      ";
                      
                 }
                 echo "</ul>";
                }else{
                    if($checkI=="yes"){
                     echo "<p class='Message'>Pas d infirmiers inscrits</p>";
                     }else{
                        echo '<p class="error">element pas trouvé</p>';
                     }
                }
                                    

                    ?>
</div>
</div>

<?php
 if(isset($_GET['StaffProfile']))
    { if($_GET['StaffProfile']==="Show")
        {
?>

<div class="AffichageProfileStaff">
              <?php 

                            if(isset($_GET['Staff'])){

                                $NomPrenom=$_GET['Staff'];
                                if(isset($_GET['StaffId'])){
                                
                                    $StaffId=$_GET['StaffId'];
                                    $StaffType=$_GET['StaffType'];
                                ?>
                                    <p>Profile de <?php echo $NomPrenom;?> "<?php echo $StaffType; ?>"</p>
                                    <iframe src="Show/PStaff/ShowProfileStaff.php?StaffId=<?php echo $StaffId;?>" width="100%" >
                                    </iframe>

                                    
                                <?php
                                }
                            }
                       
              ?>
       
       
</div>

<?php

         }
        }

        ?>
<?php

if(isset($_GET['Function'])=='FP'){
    
    $StaffId=$_GET['StaffId'];
    $StaffNom=$_GET['StaffNom'];
    $StaffPrenom=$_GET['StaffPrenom'];

?>
<!--CREATION / MODIFICATION FICHE DE PAIE-->
<div class="fiche-de-paie-Elements ">
<div class="Creation-FichePaie">
    <p>Ajout Fiche de paie pour <?php echo $StaffNom." ".$StaffPrenom;?></p>
    <form action="includes/CreationFPForm_inc.php?StaffId=<?php echo $StaffId;?>&StaffNom=<?php echo $StaffNom;?>&StaffPrenom=<?php echo $StaffPrenom;?>" class="CreationFPForm" method="post">
        <label for="SB">Salaire de base:</label>
        <div class="inpIcon">
            <i class="fas fa-coins"></i>
        <input type="number" name="SB" min=0 placeholder="Salaire de base" required>
        </div>

        <label for="IEP">Indemnité d'expérience professionnel:</label>
        <div class="inpIcon">
            <i class="fas fa-coins"></i>
        <input type="number" name="IEP" min=0 placeholder="IND.EXP.PRO" required>
        </div>

        <label for="IN">Indemnité nuisances:</label>
        <div class="inpIcon">
            <i class="fas fa-coins"></i>
        <input type="number" name="IN" min=0 placeholder="IND.nuisances" required>
        </div>

        <label for="IDisp">Indemnité Disponibilité:</label>
        <div class="inpIcon">
        <i class="fas fa-circle-notch"></i>
        <input type="number" name="IDisp" min=0 placeholder="IND.Disponibilite" required>
        </div>

        <label for="Panier">Panier:</label>
        <div class="inpIcon">
        <i class="fas fa-utensils"></i>
        <input type="number" name="Panier" min=0 placeholder="Panier" required>
        </div>

        <label for="Transport">Transport:</label>
        <div class="inpIcon">
        <i class="fas fa-bus"></i>
        <input type="number" name="Transport" min=0 placeholder="Transport" required>
        </div>

        <label for="Ret">Retenues:</label>
        <div class="inpIcon">
        <i class="far fa-minus-square"></i>
        <input type="number" name="Ret" min=0 placeholder="Retenues" required>
        </div>

        <center>
        <button type="submit" name="Creer">Créer</button>
        <button type="reset" name="Annuler">Annuler</button>
       </center>




    </form>

</div>


<!--HISTORIQUE FICHE DE PAIE-->
<div class="Historique-fiches-paie">
        <p>Historique de fiche de paies</p>
         <ul>
         <?php
                include_once "includes/FonctionFP_inc.php";
                include_once "../../src/includes/DataBaseConn.php";
                $result=ShowHistoriqueFP($conn,$StaffId);
                while($row=mysqli_fetch_assoc($result)){
                  $FPId=$row['FP_Id'];
                  $FPDate=$row['FP_Date_Creation'];
                 ?>
                    <a class="l1" href='StaffOperations.php?Function=FP&FPS=Show&FPId=<?php echo $FPId?>&StaffId=<?php echo $StaffId?>'><li class="list1">
                   <?php 
                   echo "Fiche "."<br/> ".$FPDate;
                   ?>
                  </li></a>
                    <a class="l2" title='Supprimer fiche de paie' href='StaffOperations.php?Function=FP&FPDelete=<?php echo $FPId?>&StaffId=<?php echo $StaffId?>'><i class="fas fa-trash-alt"></i></a>
                 
                 <?php
                }
          ?>
          </ul>



</div>
</div>


<?php
          if(isset($_GET['Show'])){
            if($_GET['Show']=="Yes"){
                $FFPId=$_GET['FPId'];
                $FNSS=$_GET['NSS'];
                $FSfam=$_GET['Sfam'];
                $FDateRec=date('d-m-Y', strtotime($_GET['DateRec']));
                $FFPDate=$_GET['FPDate'];
                $FSB=$_GET['SB'];
                $FIEP=$_GET['IEP'];
                $FIN=$_GET['IN'];
                $FIDisp=$_GET['IDisp'];
                $FPanier=$_GET['Panier'];
                $FTransport=$_GET['Transport'];
                $FRet=$_GET['Ret'];
                $FTotal=$_GET['Total'];
                $FStaffNom=$_GET['StaffNom'];
                $FStaffPrenom=$_GET['StaffPrenom'];
                $FStaffId=$_GET['StaffId'];
                $FStaffDateNaiss=$_GET['StaffDateNaiss'];
                $FStaffType=$_GET['StaffType'];
                $FMois=date('M', strtotime($_GET['FPDate']));
                $FYear=date('Y', strtotime($_GET['FPDate']));

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


          <?php
            }

          }
          
          
          ?>

</section>
<?php

}
 include "footer.php"; ?>