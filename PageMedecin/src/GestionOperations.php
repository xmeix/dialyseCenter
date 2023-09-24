<?php
  include "header.php";
  

  include_once "../../src/includes/DataBaseConn.php";
  include_once "includes/FonctionProfilesPatients_inc.php";
  include_once "includes/FonctionOrdonnancePatients_inc.php";
  if(!isset($_SESSION)){
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$Medecin=$_SESSION["user_Id"];

if($_GET['OP']==="ChartO"){
  $Patient=$_GET['Patient'];
  $Medecin=$_GET['Medecin'];
  $NP=$_GET['NP'];
?>

  <head>
    
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Numéro operation', 'Poids Avant Operation', 'Poids Aprés operation'],
          <?php
          $sql="SELECT * FROM (SELECT * FROM Operation  WHERE Id_Patient = $Patient ORDER BY Id_Op DESC LIMIT 7) sub ORDER BY Id_Op ASC ;";
          $result=mysqli_query($conn,$sql);
         
          while($row=mysqli_fetch_assoc($result)){
            
            echo "['".$row['Id_Op']."',".$row['Poid_Avant'].",".$row['Poid_Apres']."],";
            
          }
          
            echo "[0,0,0]";
          
            
          ?>
          
         
        ]);

        var options = {
          chart: {
            title: 'Poids Performance',
            subtitle: 'Progression du poids aprés chaque opération',
          }

          
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Numéro operation', 'Tension Avant Operation', 'Tension Aprés operation'],
          <?php
          $sql="SELECT * FROM (SELECT * FROM Operation WHERE Id_Patient = $Patient ORDER BY Id_Op DESC LIMIT 7) sub ORDER BY Id_Op ASC ;";
          $result=mysqli_query($conn,$sql);
          
          while($row=mysqli_fetch_assoc($result)){

            echo "['".$row['Id_Op']."',".$row['Tension_Avant'].",".$row['Tension_Apres']."],";
          }

          echo "[0,0,0]";
          
        
          ?>
        ]);

        var options = {
          chart: {
            title: 'Tension artérielle',
            subtitle: 'Progression de la tension artérielle aprés chaque opération',
          }
        };
        var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

    </script>
  </head>

<?php }?>

<section class="Part-five">
<div class="Wrap-Pat-List" >
        <p class="title">Gestion des opérations de dialyse chaque patient</p>
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
                                        
                                        
                                        echo "<a class='link1' title='Afficher les graphes de suivi' href='GestionOperations.php?OP=ChartO&Patient=".$Patient."&Medecin=".$Medecin."&NP=".$NomPrenom."'><li id='patient' class='list-elt'>";
                                        echo $userNom." ".$userPrenom;
                                        echo "</li></a>
                                        <a class='link2' title='Créer information d opération ' href='GestionOperations.php?OP=CreateO&Patient=".$Patient."&Medecin=".$Medecin."&NP=".$NomPrenom."'><i class='fas fa-plus-square'></i></a>
                                        <a class='link3' title='Voir historique des opérations' href='GestionOperations.php?OP=HistO&Patient=".$Patient."&Medecin=".$Medecin."&NP=".$NomPrenom."'><i class='fas fa-clipboard-list'></i></a>
                                        ";
                                        
                                        
                                    
                                    }
                                    echo "</ul>";
                                }
                    ?>


        </div>
</div>

<?php
if(isset($_GET['OP'])){
  //_________________________________________________________________
  if($_GET['OP']==="CreateO"){
    $Patient=$_GET['Patient'];
    $Medecin=$_GET['Medecin'];
    $NP=$_GET['NP'];
    

  ?>

<div class="CreationOpInfo">
    <p class="title">Informations sur l'opération du patient <?php echo $NP;?></p>
    <p class="sous-title">veuillez mettre la valeur du poids et la tension du patients avant et aprés chaque opération de dialyse</p>
    <center><form action="includes/CreationOpForm_inc.php?Patient=<?php echo $Patient;?>&Medecin=<?php echo $Medecin;?>&NP=<?php echo $NP;?>" class="CreationOpForm" method="post">
         
         <div class="wrap">
           <label for="PAv">Poids avant l'opération:</label>
           <div class="inp">
            <i class="fas fa-weight"></i>
            <input type="number" name="PAv" step="0.01" min="0">
            
            </div> 

            <label for="TAv">Tension avant l'opération:</label>
            <div class="inp">
            <i class="fas fa-stethoscope"></i>
           
            <input type="number" name="TAv" step="0.01" min="0"> 
            </div> 
            </div>
            <div class="wrap">
            <label for="PAp">Poids aprés l'opération:</label>
            <div class="inp">
            <i class="fas fa-weight"></i>
            <input type="number" name="PAp" step="0.01" min="0">
            
          </div>
          <label for="TAp">Tension aprés l'opération:</label>
          <div class="inp">
          <i class="fas fa-stethoscope"></i>
          <input type="number" name="TAp" step="0.01" min="0">
          
          </div>
          </div>
         
        <center>
          
          <button type="submit" name="Ajouter">Ajouter info</button>
          <button type="reset">Annuler</button>
        </center>
        <?php
        if(isset($_GET['Error'])){
          if($_GET['Error']=="Added"){
            ?>
              <p class="success"> Information opération ajoutés avec succés </p>

            <?php
          }
        }
        ?>
    </form></center>

    <style>
                        @media (min-width: 650px) {
                        .Part-five {
                            display: grid;
                            grid-template-columns: 40% 59%;
                            grid-gap: 1%;
                        }}
                        
                        </style>

  <?php
  //style1
} 

//____________________________________________________________________

if($_GET['OP']==="ChartO"){
  $Patient=$_GET['Patient'];
  $Medecin=$_GET['Medecin'];
  $NP=$_GET['NP'];
?>
  
  <div class="Chart-Container">
    
  <p class="title">le graphe qui represente la progression du poids du patient</p>
  <center><div id="columnchart_material" style="width: 390px; height: 400px;"></div>
  </center>
  <p class="title">le graphe qui represente la progression de la tension artérielle du patient</p>
  <center><div id="columnchart_material2" style="width: 390px; height: 400px;"></div>
  </center>
</div>




<?php
}


}

?>
<?php if(isset($_GET['OP'])){ 
  if($_GET['OP']==="HistO"){
    $Patient=$_GET['Patient'];
    $Medecin=$_GET['Medecin'];
    $NP=$_GET['NP'];
  ?>
<div class="Historique-op">
    <p class="title">Toute les opérations faites par le patient <?php echo $NP;?></p>
    <ul>
    <?php
    
    $sql="SELECT * FROM (SELECT * FROM Operation  WHERE Id_Patient = $Patient ORDER BY Id_Op DESC LIMIT 7) sub ORDER BY Date_Op DESC;";
          $result=mysqli_query($conn,$sql);
         
          while($row=mysqli_fetch_assoc($result)){
            $DateOp=$row['Date_Op'];
            $Id_Op=$row['Id_Op'];
            $Id_Staff=$row['Id_Medecin'];
            $PoidAv=$row['Poid_Avant'];
            $TensionAv=$row['Tension_Avant'];
            $PoidAp=$row['Poid_Apres'];
            $TensionAp=$row['Tension_Apres'];
            $res=InfoUser($conn,$Id_Staff);
            while($ro=mysqli_fetch_assoc($res)){
              $NomMed=$ro['user_Nom'];
              $PrenomMed=$ro['user_Prenom'];
            }
                  ?>
                  <li> 
                  <div class="wrap">
                  <p class="IdOp"> <span> Id opération: </span> <?php echo $Id_Op; ?></p> 
                  <p class="Med"> <span>Médecin affecté: </span> <?php echo $NomMed." ".$PrenomMed; ?></p>
                  <p class="Poids"> <span>Poids Avant l'opération : </span><?php echo $PoidAv; ?>Kg <br> <span> Poids Aprés l'opération :</span> <?php echo $PoidAp; ?>Kg</p>
                  <p class="Tension"> <span>Tension Avant l'opération : </span><?php echo $TensionAv; ?>Mm <br> <span>Tension Aprés l'opération : </span><?php echo $TensionAp; ?>Mm</p>

                  <p class="Date"> <?php echo $DateOp; ?></p>
                  </div>
                  <a class="link1" title='Supprimer info-opération' href="includes/GestionOperations_inc.php?OP=Delete&OpId=<?php echo $Id_Op;?>&Patient=<?php echo $Patient;?>&Medecin=<?php echo $Medecin;?>&NP=<?php echo $NP;?>"><i class="fas fa-backspace"></i></a>
                  </li>
                  
                  
                  
                  <?php
            
            
          }
    
    
    


    
    ?>
        </ul>

</div>
                    <style>
                        @media (min-width: 650px) {
                        .Part-five {
                            display: grid;
                            grid-template-columns: 40% 59%;
                            grid-gap: 1%;
                        }}
                        
                        </style>
<?php     } 

}?>
    

</section>

<?php
include "footer.php";
?>