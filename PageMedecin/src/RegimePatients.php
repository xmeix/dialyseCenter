
<?php
  include "header.php";
  

  if(!isset($_SESSION)){
    session_start();
}

include_once "../../src/includes/DataBaseConn.php";
include_once "includes/FonctionRegime_inc.php";

$Medecin=$_SESSION["user_Id"];

?>

<section class="Part-four">
            <div class="Wrap-PR" id="Wrap-PR">
                    <p class="title">mes patients</p>
                    <div class="patients-list">
                        <div class="list-title">
                            <p>Appuyez sur un patient pour lui designer son régime alimentaire</p>
                        </div>
                        <?php

                                include_once "../../src/includes/DataBaseConn.php";
                                include_once "includes/FonctionProfilesPatients_inc.php";
                                
                                $result=PatientAMedecin($conn,$Medecin);
                                while($row=mysqli_fetch_assoc($result)){
                                    $Patient=$row['Patient_Id'];
                                    
                                    $result2= InfoUser($conn,$Patient);
                                                echo "<ul>";
                                                
                                                while($row2=mysqli_fetch_assoc($result2)){

                                                    $userNom=$row2["user_Nom"];
                                                    $userPrenom=$row2["user_Prenom"];
                                                    $userId=$row2['user_Id'];
                                                    
                                                    echo "<a class='link1' title='Voir régime' href='RegimePatients.php?OP=ShowR&Patient=".$userId."&User=".$userNom." ".$userPrenom."'><li id='patient' class='list-elt'>";
                                                    echo $userNom." ".$userPrenom;
                                                    echo "</li></a>";
                                                    
                                                
                                                }
                                                echo "</ul>";
                                            }
                                ?>
                        </div>
           </div>
        
           <?php if(isset($_GET['OP'])){
               if($_GET['OP']=="ShowR"){

                    $Patient=$_GET['Patient'];
                    $NP=$_GET['User'];
                    
                    ?>
                    <div class="Regime-Container">
                        <p class="titre-r">
                            le régime alimentaire du patient <?php echo $NP;?>
                        </p>
                        <div class="Reg">
                            <div class="Auto">
                                <p class="Yes">Aliments autorisé</p>
                                <div class="lPAuto">
                                <ul>
                                    <?php
                                        $result=GetAuto($conn,$Medecin,$Patient,0);
                                        while($row=mysqli_fetch_assoc($result)){
                                            $Aliment=$row['Aliment'];
                                            $Id=$row['Id_Reg'];
                                            ?>
                                            <li><?php echo $Aliment;?><a title='Supprimer aliment' href="includes/Regime_inc.php?Delete=<?php echo $Id;?>&Patient=<?php echo $Patient; ?>&User=<?php echo $NP; ?>"><i class="fas fa-minus-circle"></i></a></li>
                                            
                                            <?php
                                        }
                                    
                                    
                                    ?>
                                    </ul>
                                </div>
                                <form action="includes/Regime_inc.php?Auto=YES&Patient=<?php echo $Patient; ?>&Medecin=<?php echo $Medecin; ?>&&Medecin=<?php echo $Medecin; ?>&User=<?php echo $NP; ?>" class="Auto-Form" method="post">
                                <input type="text" name="Aliment" placeholder="ecrire aliment" required>
                                <center>
                                <button type="submit" name="A"><i class="fas fa-plus-circle plus">Ajouter Aliment</i></button>    
                                </center>
                                </form>

                            </div>
                            <div class="Pas-Auto">
                                <p class="No">Aliments pas autorisé</p>
                                <div class="lAuto">
                                <ul>
                                    <?php
                                        $result=GetAuto($conn,$Medecin,$Patient,1);
                                        while($row=mysqli_fetch_assoc($result)){
                                            $Aliment=$row['Aliment'];
                                            $Id=$row['Id_Reg'];
                                            ?>
                                            <li><?php echo $Aliment;?><a title='Supprimer aliment' href="includes/Regime_inc.php?Delete=<?php echo $Id;?>&Patient=<?php echo $Patient; ?>&User=<?php echo $NP; ?>"><i class="fas fa-minus-circle"></i></a></li>
                                            
                                            <?php
                                        }
                                    
                                    
                                    ?>
                                    </ul>
                                </div>
                                <form action="includes/Regime_inc.php?PasAuto=YES&Patient=<?php echo $Patient; ?>&Medecin=<?php echo $Medecin; ?>&&Medecin=<?php echo $Medecin; ?>&User=<?php echo $NP; ?>" class="PAuto-Form" method="post">
                                <input type="text" name="Aliment" placeholder="ecrire aliment" required>
                                <center>
                                <button type="submit" name="PA"><i class="fas fa-plus-circle minus">Ajouter Aliment</i></button>    
                                </center>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <style>
                        @media (min-width: 650px) {
                            .Part-four{
                                display:grid;
                                grid-template-columns: 40% 59%;
                                grid-gap:1%
                            }
                        }
                    </style>
                    <?php

                
               }
               
               ?>
           <?php } ?>

</section>

  


<?php
include "footer.php";
?>s