<?php
  include "header.php";
  
  if(!isset($_SESSION)){
    session_start();
    }

    include_once "../../src/includes/DataBaseConn.php";
    include_once "includes/FonctionGestionAffectation_inc.php";
    

?>



<section class="Part-Eight">

<div class="wrapShow">
    <div class="ShowPNAL">
        <div class="title">La liste des patients non affecté</div>
        <div class="sub-title">La liste des patients qui n'ont pas encore des medecins affecté. <br>
            si vous cliquez sur un patient , vous allez pouvoir lui affecter un medecin sinon si vous appuyez sur le bouton TRASH en rouge la demande de patients sera supprimé de la liste des demandes accépté immediatement .
        </div>
    <?php
    $result=VerifyNonAffected($conn);
    
    echo '<ul>' ;
    while($row=mysqli_fetch_assoc($result)){
        
        $Patient=$row['Id_Patient'];
        $PNP=$row['user_Nom']." ".$row['user_Prenom'];
        
        echo "<a class='link1' title='affecter médecin' href='GestionAffectation.php?OP=Form1&Patient=".$Patient."&PNP=".$PNP."'><li id='patient' class='list-elt'>";//onclick='showHidePatientMenu(".$i.")
        echo $PNP;
        echo "</li></a>
        <a class='link2' title='Supprimer la demande' href='includes/AffectationForm_inc.php?OP=Delete&Patient=".$Patient."&PNP=".$PNP."'><i class='fas fa-trash-alt'></i></a>";
                                        
    }
    echo '</ul>';
    ?>
    </div>
        
        <div class="ShowPAL">
               <div class="title">La liste des patients affecté</div>
               <div class="sub-title">La liste des patients qui ont déja des medecins affectés. <br>
                   si vous cliquez sur un patient , vous allez pouvoir modifier son médecin affecté, sinon si vous appuyez sur le bouton TRASH en rouge l'affectation sera supprimé de la liste immediatement .
               </div>
                <?php
                    $result=VerifyAffected($conn);
    
                    echo '<ul>' ;
                    while($row=mysqli_fetch_assoc($result)){
        
                        $Medecin=$row['Staff_Id'];
                        $Patient=$row['Patient_Id'];
                        $PNP=$row['user_Nom']." ".$row['user_Prenom'];
                        $res=getInfo($conn,$Medecin);
                        while($ro=mysqli_fetch_assoc($res)){

                            $MNP=$ro['user_Nom']." ".$ro['user_Prenom'];

                        }
                        echo "<a class='link1' title='Modifier médecin affecté' href='GestionAffectation.php?OP2=Form2&Patient=".$Patient."&PNP=".$PNP."'><li id='patient' class='list-elt'>";//onclick='showHidePatientMenu(".$i.")
                        echo $PNP."<br/> <span> Médecin Affecté:</span> ".$MNP;
                        echo "</li></a>
                        <a class='link2' title='supprimer patient de cette liste' href='includes/AffectationForm_inc.php?OP2=Delete2&Patient=".$Patient."&PNP=".$PNP."'><i class='fas fa-trash-alt'></i></a>";
                                        
                     }
                    echo '</ul>';
                 ?>
                 
        </div>
</div>


        <?php if(isset($_GET['OP'])){?>
        <?php if($_GET['OP']=="Form1"){
            $Patient=$_GET['Patient'];
            $PNP=$_GET['PNP'];
            ?>
            
            <div class="AffecterWrap">
                <p class="titre">Affecter Médecin au patient <?php echo $PNP;?></p>
                <p class="sous-titre">Pour pouvoir créer un emplois de dialyse a ce patient ou ajouter des seances de dialyse, vous devez choisir un médecin pour le suivre.</p>
                <form action="includes/AffectationForm_inc.php?Patient=<?php echo $Patient;?>&PNP=<?php echo $PNP;?>" class="Affectation-form" method="post">
                       
                        <label for="MedecinId">Médecin:</label>
                       <select name="MedecinId" required> 
                       <option value="" name="MedecinId" disabled selected>Veuillez choisir un medecin</option>
                       <?php

                            $result=AllMed($conn);
                           while($row=mysqli_fetch_assoc($result)){
                               $MedecinId=$row['user_Id'];
                               $MedecinNom=$row['user_Nom'];
                               $MedecinPrenom=$row['user_Prenom'];
                               ?>
                              
                               <option value="<?php echo $MedecinId;?>" name="MedecinId"><?php echo $MedecinNom." ".$MedecinPrenom;?></option>
                           
                        <?php
                           }
                
                        ?>
                        
                </select>
                <center>
                    <button type="submit" name="Affecter">Affecter</button>
                    <button type="reset" name="Annuler">Annuler</button>
                
                </center>
                
                </form>

                
            </div>
        
        <?php }?>

       


        <?php }  ?>
        <?php if(isset($_GET['OP2']))
        {   
        
        ?>

        <?php if($_GET['OP2']=="Form2"){
            $Patient=$_GET['Patient'];
            $PNP=$_GET['PNP'];
            ?>

            
            <div class="ModifierAffWrap">
            <p class="titre">Modifier Médecin affecté au patient <?php echo $PNP;?></p>
                <p class="sous-titre">Pour pouvoir créer un emplois de dialyse a ce patient ou ajouter des seances de dialyse, vous devez choisir un médecin pour le suivre.</p>
                <form action="includes/AffectationForm_inc.php?Patient=<?php echo $Patient;?>&PNP=<?php echo $PNP;?>" class="Affectation-form" method="post">
                       
                        <label for="MedecinId">Médecin:</label>
                       <select name="MedecinId" required> 
                       <option value="" name="MedecinId" disabled selected>Veuillez choisir un medecin</option>
                       <?php

                            $result=AllMed($conn);
                           while($row=mysqli_fetch_assoc($result)){
                               $MedecinId=$row['user_Id'];
                               $MedecinNom=$row['user_Nom'];
                               $MedecinPrenom=$row['user_Prenom'];
                               ?>
                              
                               <option value="<?php echo $MedecinId;?>" name="MedecinId"><?php echo $MedecinNom." ".$MedecinPrenom;?></option>
                           
                        <?php
                           }
                
                        ?>
                        
                </select>
                <center>
                    <button type="submit" name="Modifier">Modifier</button>
                    <button type="reset" name="Annuler">Annuler</button>
                
                </center>
                
                </form>

                
            </div>

        <?php }}?>

       


</section>


            
<?php
include "footer.php";
?>