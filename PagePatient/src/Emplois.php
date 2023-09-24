<?php
  include "header.php";
  include "../../src/includes/DataBaseConn.php";
  
  
  if(!isset($_SESSION)){
    session_start();
}
$Patient_Id=$_SESSION["user_Id"];
?>

<section class="Part-three"  id="PartThree">
<p class="title-Edt">Demande emplois de dialyse</p>
<div class="container-dem-affich">
    <div class="demande-edt">
        <p class="titre-info">Pour avoir des séances de dialyse dans le centre vous devez envoyer une demande de création d'un emplois spécial pour vos opérations.</p>
        <form action="includes/Emplois_form_inc.php?PatientId=<?php echo $Patient_Id; ?>" class="EnvoiDemForm" method="post">
        <p>Pour envoyer une demande d'emplois, vous devez faire un click sur le bouton "Envoyer"<br>
        Pour annuler votre demande , vous devez faire un click sur le bouton "Annuler".
        </p>
        
        <center>
            <button type="submit" name="Envoyer">Envoyer</button>
            <button type="submit" name="Annuler">Annuler</button>
        </center>
        </form>
        <?php

include "includes/FonctionEmplois_inc.php";
if(isset($_GET['Demande'])){
    if($_GET['Demande']==="Envoyé"){
        echo "<p class='Message'> Votre demande est envoyé avec succés.</p>";

    }
    if($_GET['Demande']==="Annulé"){
        echo "<p class='Message'> Votre demande a été annulé avec succés.</p>";
    }
    if($_GET['Demande']==="ExisteDeja"){
        echo "<p class='Message'> Vous avez deja envoyé une demande , elle est en cours de traitement.</p>";

    }
    if($_GET['Demande']==="NoDemandFound"){
        echo "<p class='Message'> Vous n'avez pas encore envoyé une demande pour l'annuler.</p>";

    }

    
    
}


?> 
    </div>
     <?php
                
                if(ifDemAccepted($conn,$Patient_Id)!==false)//SI LE PATIENT A UNE DEMANDE DEJA ACCEPTÉ ON AFFICHE L EMPLOIS
                {
                    $aujourdhui=date('Y-m-d');
                    $aujourdhui1=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+1,date("Y")));
                    $aujourdhui2=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+2,date("Y")));
                    $aujourdhui3=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+3,date("Y")));
                    $aujourdhui4=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+4,date("Y")));
                    $aujourdhui5=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+5,date("Y")));
                    $aujourdhui6=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+6,date("Y")));
                    
                    ?>

                <div class="affichage-edt">
                <p class="Edt-title">Emplois du temps des séances</p>
                <p class='Message'> Votre Demande a été accepté, Vous pouver toujours envoyer des demandes pour des modifications.</p>
                <table class="blueTable">
                    
            <thead>
            
                <p class="tih"><?php echo date('Y-m');?></p>
            
            <tr>
            <th>Date/Heure</th>
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
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui1);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui2);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui3);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui4);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui5);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"8h-9h",$aujourdhui6);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            </tr>
            <tr>
            <td>9h-10h</td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui1);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui2);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui3);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui4);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui5);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"9h-10h",$aujourdhui6);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            </tr>
            <tr>
            <td>10h-11h</td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui1);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui2);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui3);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui4);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui5);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"10h-11h",$aujourdhui6);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            </tr>
            <tr>
            <td>11h-12h</td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui1);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui2);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui3);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui4);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui5);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"11h-12h",$aujourdhui6);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            </tr>
            <tr>
            <td>12h-13h</td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui1);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui2);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui3);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui4);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui5);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"12h-13h",$aujourdhui6);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            </tr>
            <tr>
            <td>13h-14h</td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui1);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui2);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui3);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui4);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui5);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"13h-14h",$aujourdhui6);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            </tr>
            <tr>
            <td>14h-15h</td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui1);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui2);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui3);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui4);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui5);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"14h-15h",$aujourdhui6);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            </tr>
            <tr>
            <td>15h-16h</td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui1);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui2);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui3);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui4);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui5);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"15h-16h",$aujourdhui6);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            </tr>
            <tr>
            <td>16h-17h</td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui1);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui2);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui3);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui4);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui5);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            <td><?php 
            include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
            $MedecinNom=AfficheSeance($conn,$Patient_Id,"16h-17h",$aujourdhui6);
            if($MedecinNom!==false){
            echo "chez médecin ".$MedecinNom;}?>
            </td>
            </tr>

            </tbody>
            </table>

                    </div>
        <?php
    

}
    
    
    ?>
   
</div>
</section>


<?php
include "footer.php";

?>