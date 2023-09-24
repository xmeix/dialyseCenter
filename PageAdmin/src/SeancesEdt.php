

  <?php
  include "header.php";
  include "../../src/includes/DataBaseConn.php";
  include_once "includes/FonctionGestionAffectation_inc.php";

 
?>

<section class="Part-five"  id="PartFive">
    
        <div class="showPatientsList">
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
                        echo "<a class='link1' title='Ajouter séance' href='SeancesEdt.php?OP=Form&Patient=".$Patient."&PNP=".$PNP."&Medecin=".$Medecin."&MNP=".$MNP."'><li id='patient' class='list-elt'>";//onclick='showHidePatientMenu(".$i.")
                        echo $PNP."<br/> <span> Médecin Affecté:</span> ".$MNP;
                        echo "</li></a>
                        <a class='link2' title='voir emplois de dialyse' href='SeancesEdt.php?OP=ShowEdt&Patient=".$Patient."&PNP=".$PNP."'><i class='far fa-calendar-alt'></i></a>
                        <a class='link3'  title='vider emplois de dialyse' href='SeancesOperations.php?OP=Erase&Patient=".$Patient."&PNP=".$PNP."'><i class='fas fa-eraser'></i></a>
                        ";
                                        
                     }
                    echo '</ul>';
                 ?>
                 
        </div>


        <?php if(isset($_GET['OP'])){
            if($_GET['OP']=='Form'){

                $Patient=$_GET['Patient'];
                $Medecin=$_GET['Medecin'];
                $MNP=$_GET['MNP'];
                $PNP=$_GET['PNP'];
            ?>
        <div class="Form">
            <p class="form-title">Gestion des séances</p>
            <p class="Desc">Pour ajouter, modifier ou supprimer une seance , il faut remplir les champs si dessous.</p>
            <p class="sousDescription">
                <span>Patient: </span> <?php echo $PNP;?>
                <br>
                <span> Medecin: </span> <?php echo $MNP;?>
            </p>
           <form action="includes/SeanceEdtForm_inc.php?Patient=<?php echo $Patient;?>&Medecin=<?php echo $Medecin;?>&MNP=<?php echo $MNP;?>&PNP=<?php echo $PNP;?>" class="SeancesInsForm"  method="post">  
            


            

            <label for="DateS">Veuillez choisir une date séance:</label>
            <input type="date" name="DateS" id="DateS"  min=<?php echo date('Y-m-d');?> value=<?php echo date('Y-m-d');?> required>

            <label for="hours">Veuillez choisir l heure de la séance:</label>
            <select name="hours" id="hours" required>
            <option value="8h-9h" name="hours">8h-9h</option>
            <option value="9h-10h" name="hours">9h-10h</option>
            <option value="10h-11h" name="hours">10h-11h</option>
            <option value="11h-12h" name="hours">11h-12h</option>
            <option value="12h-13h" name="hours">12h-13h</option>
            <option value="13h-14h" name="hours">13h-14h</option>
            <option value="14h-15h" name="hours">14h-15h</option>
            <option value="15h-16h" name="hours">15h-16h</option>
            <option value="16h-17h" name="hours">16h-17h</option>
            
            </select>


            <div class="Messag">
                <?php
                if(isset($_GET['Error'])){
                    if($_GET['Error']==="SeancePasLibreouLEmedecinpris"){
                        ?> 
                        <p class='error'>Séance pas vide ou Médecin pas libre.</p>
                        <?php
                    }
                    if($_GET['Error']==="SeanceCreated"){
                        ?> 
                        <p class='success'>Séance créé avec succés, verifiez le planner.</p>
                        <?php

                    }
                    if($_GET['Error']==="SeanceDeleted"){
                        ?> 
                        <p class='success'>Séance supprimé avec succés, verifiez le planner.</p>
                        <?php
                    }
                    if($_GET['Error']==="SeanceDoesntExist"){
                        ?> 
                        <p class='error'>Séance n'existe pas, pour la supprimer!</p>
                        <?php
                    }
                }
                ?>
            </div>
            <center>
            <button type="submit" name="AjouterS">Ajouter</button>
            <button type="submit" name="SupprimerS">Supprimer</button>
            <button type="reset" name="Annuler">Annuler</button>
            </center>


            </form>
        </div>

        <style>
            @media (min-width: 650px) {
            .Part-five {
                
                    display: grid;
                    grid-template-columns: 49.5% 49.5%;
                    grid-gap: 1%;
                
            }}
        </style>
        <?php
            }
        ?>











<?php
    if($_GET['OP']==="ShowEdt"){
            $Patient_Id=$_GET['Patient'];
            $PatN_P=$_GET['PNP'];
            $aujourdhui=date('Y-m-d');
            $aujourdhui1=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+1,date("Y")));
            $aujourdhui2=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+2,date("Y")));
            $aujourdhui3=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+3,date("Y")));
            $aujourdhui4=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+4,date("Y")));
            $aujourdhui5=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+5,date("Y")));
            $aujourdhui6=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+6,date("Y")));
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            include_once "../../PagePatient/src/includes/FonctionEmplois_inc.php";

?>
    
    <div class="showEdt">
        <p class="Edt-title">Emplois du temps des séances du patient <?php echo $PatN_P;?></p>                
        <table class="blueTable">
            
    <thead>
    <p class="tih"><?php echo date('Y-m');?></p>
            
            <tr>
            <th>Heure\Jour</th>
            <th><?php echo date('d'); ?></th>
            <th><?php echo date ('d',mktime(0,0,0,date("m"),date("d")+1,date("Y")));?></th>
            <th><?php echo  date ('d',mktime(0,0,0,date("m"),date("d")+2,date("Y")));?></th>
            <th><?php echo  date ('d',mktime(0,0,0,date("m"),date("d")+3,date("Y")));?></th>
            <th><?php echo  date ('d',mktime(0,0,0,date("m"),date("d")+4,date("Y")));?></th>
            <th><?php echo  date ('d',mktime(0,0,0,date("m"),date("d")+5,date("Y")));?></th>
            <th><?php echo  date ('d',mktime(0,0,0,date("m"),date("d")+6,date("Y")));?></th>
            </tr>
    </thead>

    <tbody>
    <tr>
    <td>8h-9h</td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui1);
    if($MedecinNom!==false){
        echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui2);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui3);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui4);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui5);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui6);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    </tr>
    <tr>
    <td>9h-10h</td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui1);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui2);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui3);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui4);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui5);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui6);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    </tr>
    <tr>
    <td>10h-11h</td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui1);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui2);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui3);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui4);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui5);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui6);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    </tr>
    <tr>
    <td>11h-12h</td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui1);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui2);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui3);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui4);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui5);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui6);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    </tr>
    <tr>
    <td>12h-13h</td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui1);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php             $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui2);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui3);
    if($MedecinNom!==false){
   echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui4);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui5);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui6);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    </tr>
    <tr>
    <td>13h-14h</td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui1);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui2);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui3);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui4);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui5);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui6);
    if($MedecinNom!==false){
   echo '<i class="fas fa-times"></i>';}?>
    </td>
    </tr>
    <tr>
    <td>14h-15h</td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui1);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui2);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui3);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui4);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui5);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui6);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    </tr>
    <tr>
    <td>15h-16h</td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui1);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui2);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui3);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui4);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui5);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui6);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    </tr>
    <tr>
    <td>16h-17h</td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui1);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui2);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui3);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui4);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui5);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    <td><?php 
    $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui6);
    if($MedecinNom!==false){
    echo '<i class="fas fa-times"></i>';}?>
    </td>
    </tr>

    </tbody>
    </table>
    </div>


<?php
}
?>


    


















<?php
    }
    ?>
    

    






</section>
   

  
<?php
include "footer.php";
?>