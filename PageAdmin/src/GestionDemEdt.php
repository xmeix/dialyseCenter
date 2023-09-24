<?php

  include "header.php";

include "../../src/includes/DataBaseConn.php";
?>

<section class="Part-four"  id="PartFour">

        <div class="Demandes-list">
                <div class="list-title">
                    <p>La Liste des Demandes d'emplois du temps pas encore accepté</p>
                    
                </div>
                <p class="des">L'acceptation de cette demande va vous redirigé vers la page d'affectation et ensuite l'ajout des séances de dialyse pour finalement remplir son emplois du temps.Sinon, la demande sera supprimé immédiatement.</p>
                <?php

                        include_once "../../src/includes/DataBaseConn.php";
                        include_once "includes/FonctionGestionDemEdt_inc.php";
                        
                        $result=RowInfoDem($conn,0);
                                        echo "<ul>";
                                        
                                        while($row=mysqli_fetch_assoc($result)){

                                            $DemId=$row['Id_Dem'];
                                            $DemEtat=$row['Etat_Dem'];
                                            $DemDate=$row['Date_Dem'];
                                            $DemPatientId=$row['Id_Patient'];
                                            $result2=GetInfoPatientById($conn,$DemPatientId);
                                            while($row2=mysqli_fetch_assoc($result2)){
                                                $PatientNom=$row2['user_Nom'];
                                                $PatientPrenom=$row2['user_Prenom'];
                                            }
                
                                            
                                                
                                            echo '<li>Demande n°='.$DemId." | ".$PatientNom." ".$PatientPrenom." | ".$DemDate;

                                            echo "<a title='Accepter demande' href='GestionDemEdtOperations.php?Op=Accept&Demande=$DemId&PatientId=$DemPatientId'><i class='fas fa-check'></i></a>";
                                            
                                            echo "<a title='Refuser demande' href='GestionDemEdtOperations.php?Op=Refuse&Demande=$DemId'><i class='fas fa-times'></i></a></li>";
                                            
                                        
                                        }
                                        echo "</ul>";

                        ?>
                </div>
                <div class="Demandes-list">
                <div class="list-title">
                    <p>La Liste des Demandes d'emplois du temps déja accepté</p>
                    
                </div>
                <p class="des">Vous ne pouvez pas accepter ces demandes seulement si vous supprimez l'ancienne demande.</p>
                <?php

                        include_once "../../src/includes/DataBaseConn.php";
                        include_once "includes/FonctionGestionDemEdt_inc.php";
                        
                        $result=RowInfoDem($conn,1);
                                        echo "<ul>";
                                        
                                        while($row=mysqli_fetch_assoc($result)){

                                            $DemId=$row['Id_Dem'];
                                            $DemEtat=$row['Etat_Dem'];
                                            $DemDate=$row['Date_Dem'];
                                            $DemPatientId=$row['Id_Patient'];
                                            $result2=GetInfoPatientById($conn,$DemPatientId);
                                            while($row2=mysqli_fetch_assoc($result2)){
                                                $PatientNom=$row2['user_Nom'];
                                                $PatientPrenom=$row2['user_Prenom'];
                                            }
                
                                            
                                            echo '<li>Demande n°='.$DemId." | ".$PatientNom." ".$PatientPrenom." | ".$DemDate."</li>";
                                            
                                        
                                        }
                                        echo "</ul>";

                        ?>
                </div>
  
    
</section>
  
<?php
include "footer.php";
?>