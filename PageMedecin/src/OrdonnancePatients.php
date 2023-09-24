<?php
  include "header.php";
  

  if(!isset($_SESSION)){
    session_start();
}

include_once "../../src/includes/DataBaseConn.php";
include_once "includes/FonctionProfilesPatients_inc.php";
include_once "includes/FonctionOrdonnancePatients_inc.php";

$Medecin=$_SESSION["user_Id"];

?>

<section class="Part-three">
        <div class="Wrap-Ordo-Crea" id="Wrap-Ordo-Creas">
        <p class="title">Création et affichage d'ordonnances patients</p>
        <div class="patients-list">
              <div class="list-title">
                <p>Mes patients</p>
              </div>

              <?php

                    
                    $result=PatientAMedecin($conn,$Medecin);
                    while($row=mysqli_fetch_assoc($result)){
                        $Patient=$row['Patient_Id'];
                        
                        $result2= InfoUser($conn,$Patient);
                                    echo "<ul>";
                                    
                                    while($row2=mysqli_fetch_assoc($result2)){

                                        $userNom=$row2["user_Nom"];
                                        $userPrenom=$row2["user_Prenom"];
                                        $NomPrenom=$userNom." ".$userPrenom;
                                        
                                        
                                        echo "<a class='link1' title='voir historique des ordonnances' href='OrdonnancePatients.php?OP=HistO&Patient=".$Patient."&UNP=".$NomPrenom."&Nom=".$userNom."&Prenom=".$userPrenom."'><li id='patient' class='list-elt'>";
                                        echo $userNom." ".$userPrenom;
                                        echo "</li></a>
                                        <a class='link2' title='Créer ordonnance' href='OrdonnancePatients.php?OP=CreaO&Patient=".$Patient."&UNP=".$NomPrenom."'><i class='fas fa-pen-square'></i></a>";
                                        
                                        
                                    
                                    }
                                    echo "</ul>";
                                }
                    ?>


        </div>
</div>


<?php if(isset($_GET['OP'])){

if($_GET['OP']==="CreaO"){

    
    $Patient=$_GET['Patient'];
    $NP=$_GET['UNP'];   
?>

<div class="CreationOrdonnance">
    <p class="title">Création d'ordonnances patients</p>
    <p class="sous-title">Ordonnance pour le patient <?php echo $NP; ?></p>
    <form action="includes/CreationOrdForm_inc.php?Medecin=<?php echo $Medecin;?>&Patient=<?php echo $Patient;?>" class="CreationOrdonnanceForm" method="post">
    <label for="OrdType">Type d'ordonnance:</label>
                            <select name="OrdType" id="" required>
                                <option value="" disabled selected>Type ordonnance</option>
                                <option value="Analyses">Ordonnance des analyses</option>
                                <option value="Traitements">Ordonnance des traitements</option>
                            </select>

                            <label for="OrdDescription">Déscription d'ordonnance:</label>
                            <textarea name="OrdDescription" id="OrdDescription" cols="47" rows="5" required></textarea>


                            <center>
                        <button type="Create" name="Create">Créer Ordonnance</button>
                        <button type="reset" name="Annuler">Annuler</button>
                            </center>




    </form>

    <style>
                        @media (min-width: 650px) {
                        .Part-three {
                            display: grid;
                            grid-template-columns: 40% 59%;
                            grid-gap: 1%;
                        }}
                        
                        </style>
                        <?php
}
?>


</div>


        <?php
        if($_GET['OP']==="HistO"){

            $Nom=$_GET['Nom'];
            $Prenom=$_GET['Prenom'];
            
            
            $Patient=$_GET['Patient'];
            
            $NP=$_GET['UNP'];  
             
        ?>
         <div class="HistoriqueOrd">
         <p class="titre">Historique d'ordonnances faites pour <?php echo $NP;?></p>
                <div class="list">
                <ul>
                    <?php
                        $result=HistoriqueO($conn,$Medecin,$Patient);
                        while($row=mysqli_fetch_assoc($result)){
                            $OrdId=$row['Ord_Id'];
                            $OrdDate=date("d-m-Y",strtotime($row['Date_Creation']));
                            $OrdDesc=$row['Ord_Description'];
                            $OrdType=$row['Ord_Type'];
                            ?>
                            <a class="l1" title='Voir ordonnance' href="OrdonnancePatients.php?OP=HistO&Patient=<?php echo $Patient;?>&UNP=<?php echo $NomPrenom;?>&OP2=ORD&Desc=<?php echo $OrdDesc;?>&OrdType=<?php echo $OrdType; ?>&OrdDate=<?php echo $OrdDate;?>&OrdId=<?php echo $OrdId;?>&Nom=<?php echo $Nom;?>&Prenom=<?php echo $Prenom;?>"><li> Ordonnance N°=<?php echo $OrdId."  ".$OrdDate;?></li></a>
                            <a class="l2" title=' Supprimer ordonnance' href="includes/OrdonnancePatientsOperations.php?OP=Delete&Patient=<?php echo $Patient;?>&Nom=<?php echo $Nom;?>&Prenom=<?php echo $Prenom;?>&OrdId=<?php echo $OrdId;?>"><i class="fas fa-trash-alt"></i></a>
                 
                        <?php
                        }

                        ?>
                    
                    </ul>
                </div>
                   
                    <style>
                        @media (min-width: 650px) {
                        .Part-three {
                            display: grid;
                            grid-template-columns: 40% 59%;
                            grid-gap: 1%;
                        }}
                        
                        </style>
        
        



 </div>
 <?php


if(isset($_GET['OP2'])){
if($_GET['OP2']==="ORD")
{
        $Nom=$_GET['Nom'];
            $Prenom=$_GET['Prenom'];
        $OrdId=$_GET['OrdId'];
        $OrdDesc=$_GET['Desc'];
        $OrdType=$_GET['OrdType'];
        $OrdDate=$_GET['OrdDate'];
        include_once "includes/FonctionProfilesPatients_inc.php";
        $res=InfoUser($conn,$Medecin);
        while($ro=mysqli_fetch_assoc($res)){
            $NomM=$ro['user_Nom'];
            $PrenomM=$ro['user_Prenom'];
        }
?>

<div class="Ordonnance-fiche">
    <div class="title">Affichage ordonnance N° <?php echo $OrdId;?></div>
<p class="Deb">RÉPUBLIQUE ALGÉRIENNE DÉMOCRATIQUE ET POPULAIRE <br>
            Centre de dialyse AL AZHAR d'Alger <br>
            <span>Rue Boudjemaa Moghni - Hussein-Dey <br>
            Tél: 021.77.58.22 
        </span>
        </p>
        <p class="second">Hussein Dey,le <?php echo $OrdDate;?> </p>

        <p class="middle">ORDONNANDE D' <?php echo $OrdType ?></p>
        <p class="info"><span>NOM:</span><?php echo "  ".$Nom;?> <br>
            <span>PRÉNOM:</span><?php echo "  ".$Prenom;?><br>
            <span>Délivré par le docteur:</span> <?php echo $NomM." ".$PrenomM;?><br>
    
        </p>
        <div class="description">
            <?php echo  '<pre>'.str_replace(array('\n','\r'), array("\n","\r"), $OrdDesc).'<pre>';?>
        </div>
    
        <p class="signature">Signature: <br><span><?php echo $NomM." ".$PrenomM;?></span> </p>
        

    
</div>




</section>
    

    
<?php
}}}}
?>
  
<?php
include "footer.php";
?>