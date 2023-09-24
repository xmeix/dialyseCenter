<?php
include_once "header.php";
ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
?>

<section class="Part-two"  id="PartTwo">
<div class="wrap-list-for-patients" id="WrapListPat">
  <!--LISTE PATIENT-->
<div class="patients-list">
          <div class="list-title">
                <p>La Liste des patients</p>
              </div>
              <center><form action="includes/Sop.php" method="post" class="search-Bar">
                  <input type="text" name='searchV' aria-labeledby="search value" placeholder="Rechercher">
                  <center><button type="submit" name="Search"><i class="fas fa-search"></i></button>
                  <button type="submit" name="Reload"><i class="fas fa-undo-alt"></i></button>
              </center>
            </form></center>
            <?php

include_once "../../src/includes/DataBaseConn.php";
include_once "includes/FonctionPatientList_inc.php";

if(!isset($_GET['searchValue'])){
  $Type="patient";
   $result=RowInfoP($conn,$Type);
   $check="yes";
  
}else{
  $check="no";
  include_once "includes/FonctionSop.php";
  $searchV=$_GET['searchValue'];
  if($searchV==""){ 
    $result=false;
  }else{
  
    $result=searchFor($conn,$searchV);
    }
  
} echo "<ul>";
    if($result!==false ){
      
               
                
                while($row=mysqli_fetch_assoc($result)){
                    
                    $userNom=$row["user_Nom"];
                    $userPrenom=$row["user_Prenom"];
                    $userGenre=$row["user_Genre"];
                    $userDateNaiss=$row["user_DateNaiss"];
                    $userLieuNaiss=$row["user_LieuNaiss"];
                    $userEmail=$row["user_Email"];
                    $userUsername=$row["user_Username"];
                    $userNtel=$row["user_Ntel"];
                    $userGSang=$row["user_GSang"];
                    $userMChron=$row["user_MChron"];
                    $userAdresse=$row["user_Adresse"];
                    
                    //$rowInfo="Nom=".$userNom."&Prenom=".$userPrenom."&Genre=".$userGenre."&DateNaiss=".$userDateNaiss."&LieuNaiss=".$userLieuNaiss."&Email=".$userEmail."&Username=".$userUsername."&Ntel=".$userNtel."&GSang=".$userGSang."&MChron=".$userMChron."&Adresse=".$userAdresse;
                    echo "<a title='Voir profile' class='link1 ' href='PatientOperations.php?PatientUsername=".$userUsername."'><li id='patient' class='list-elt'>";
                    echo $userNom." ".$userPrenom;
                    echo "</li></a>
                    <a class='link2' title='Supprimer patient'  href='PatientOperations.php?PatientDelete=".$userUsername."'><i class='fas fa-trash-alt'></i></a>
                    <a class='link3' title='gérer les factures' href='PatientOperations.php?Function=Facture&PatientUsername=".$userUsername."'><i class='fas fa-id-badge'></i></a>
                    
                    ";
                    
                }
             
                
        }else{
          if($check=="yes"){
            echo "<p class='Message'>Liste des patients vide</p>";
            }else{
               echo '<p class="error">element pas trouvé</p>';
            }
        } echo "</ul>"; 
?>

</div>

<!--AFFICHAGE PROFIL PATIENT-->
<?php 
            if(isset($_GET['Profil']))
              {
                 if($_GET['Profil']==="show")
              {?>
 <div class="AffichagePatient">
 <?php
                      if(isset($_GET['User'])){

                        $NomPrenom=$_GET['User'];
                        if(isset($_GET['PatientUsername'])){
                          
                              $Username=$_GET['PatientUsername'];
                          ?>
                            <p>Profile du patient <?php echo $NomPrenom;?></p>
                            <iframe src="Show/PPatient/ShowProfileUser.php?PatientUsername=<?php echo $Username;?>" width="100%" >
                            </iframe>

                            
                          <?php
                          }
                       }

                       

              
              ?>
 </div>

 <?php
 
                      }}
                      ?>

</div>


<?php
       
       if(isset($_GET['Function'])=='Facture'){

       //TO SEND TO FORM_INC
            $PatientUsername=$_GET['PatientUsername'];
            $userNom=$_GET['UserNom'];
            $userPrenom=$_GET['UserPrenom'];
            $userDateNaiss=$_GET['UserDateNaiss'];
            $userId=$_GET['UserId'];
          ?>
<div class="Factures-elements" id="FactureElements">
<div class="Creation-facture">
            <p>Ajout facture pour <?php echo $userNom." ".$userPrenom;?></p>
            <form action="includes/CreationFactureForm_inc.php?PatientUsername=<?php echo $PatientUsername;?>&UserNom=<?php echo $userNom ?>&UserPrenom=<?php echo $userPrenom?>&UserDateNaiss=<?php echo $userDateNaiss?>&UserId=<?php echo $userId?>" class="CreationFactureForm" method="post">
                
                  <div class="always-in">
                  <label for="Seances_nb">Nombre de séances:</label>
                  <div class="inpIcon"> 
                    <i class="fas fa-sort-numeric-up"></i>
                    <input type="number" name="Seances_nb" id="Seances_nb" min=0 required>
                    
                  </div>

                  <label for="Seance_prix">Prix d'une séance:</label>
                  <div class="inpIcon">
                  <i class="fas fa-dollar-sign"></i>
                  <input type="number" name="Seance_prix" id="Seance_prix" min=0 required>
                  </div>

                  <label for="Soins_additionnels">Soins additionnels?</label>
                  <div class="inpIcon">
                  <i class="fas fa-procedures"></i>
                  <select name="Soins_additionnels" id="Soins_additionnels" onChange="SiOuiCheck()" required>
                    <option value="">Oui ou Non</option>
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                  </select>

                  </div>
                </div>
                  <div class="si-oui-soins" id="si-oui-soins">
                      <label for="Soins_prix">Prix soins additionnels:</label>
                      <div class="inpIcon">
                      <i class="fas fa-hand-holding-usd"></i>
                      <input type="number" name="Soins_prix" id="Soins_prix" min=0>
                      </div>
                  </div>
                  <center>
                    <button type="submit" name="Ajouter">Ajouter</button>
                    <button type="reset" name="Annuler">Annuler</button>
                  </center>


          
          
            </form>
            <div class="messages"></div>
          </div>

<div class="Liste-Factures-container" id="ListeFacturesContainer">
<p>Historique des factures</p>
<ul>
         <?php
                include_once "includes/FonctionFacture_inc.php";
                include_once "../../src/includes/DataBaseConn.php";
                $result=ShowHistoriqueFactures($conn,$userId);
                while($row=mysqli_fetch_assoc($result)){
                  $Facture_Id=$row['Facture_Id'];
                  $Facture_Date=$row['Facture_Date'];
                 ?>
                 <a class="l1" href='PatientOperations.php?Function=Facture&Facture=Show&FactureId=<?php echo $Facture_Id?>&PatientUsername=<?php echo $PatientUsername?>'><li class="list1">
                   <?php 
                   echo "Facture"."<br/>".$Facture_Date;
                   ?>
                  </li></a>
                 <a class="l2" title='Supprimer facture' href='PatientOperations.php?Function=Facture&FactureDelete=<?php echo $Facture_Id?>&PatientUsername=<?php echo $PatientUsername?>'><i class="fas fa-trash-alt"></i></a>
                 
                 <?php
                }
          ?>
          </ul>
</div></div>
<?php
          if(isset($_GET['Show'])){
            if($_GET['Show']=="Yes"){
              
              $Nom=$_GET['UserNom'];
              $Prenom=$_GET['UserPrenom'];
              $IdU=$_GET['UserId'];
              $UDN=date('d-m-Y', strtotime($_GET['UserDateNaiss']));
              $FDate=date('d-m-Y', strtotime($_GET['DateFacture']));
              $SN=$_GET['PatientSeances'];
              $SP=$_GET['SeancePrix'];
              $FS=$_GET['FraisSoins'];
              $FM=$_GET['FactureMontant'];
              $IdF=$_GET['FactureId'];
              $Year=date('Y', strtotime($_GET['DateFacture']));
                  
              ?>
          <div class="show-facture" id="show-facture">
            <p class="title-fact">FACTURE <?php echo $IdF." ".$FDate;?> , PATIENT <?php echo $Nom." ".$Prenom;?>.</p>
            
            <div class="facture">
              
                <p class="first">Fait à ALGER, le : <?php echo $FDate;?> </p>
                <p class="second">Facture N° : <?php echo "FP".$IdF;?><br>
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
         

          <?php
            }

          }
          ?>
          
</section>


<?php
        
        
        
        
        

       }
       ?>


<?php include "footer.php"; ?>