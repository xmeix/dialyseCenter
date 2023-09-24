<?php
include "header.php";
include_once "../../src/includes/DataBaseConn.php";
include_once "includes/FonctionReg.php";
include_once "../../PageMedecin/src/includes/FonctionProfilesPatients_inc.php";

  if(!isset($_SESSION)){
    session_start();
    
}

$Patient=$_SESSION["user_Id"];
$res=InfoUser($conn,$Patient);
        while($r=mysqli_fetch_assoc($res)){
          $NP=$r['user_Nom']." ".$r['user_Prenom'];
        }
?>
<section class="Part-Five">
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

<div class="Chart-Container">
    
  <p class="title">le graphe qui represente la progression du poids du patient</p>
  <center><div id="columnchart_material" style="width: 390px; height: 400px;"></div>
  </center>
  <p class="title">le graphe qui represente la progression de la tension artérielle du patient</p>
  <center><div id="columnchart_material2" style="width: 390px; height: 400px;"></div>
  </center>
</div>




<div class="Historique-op">
<p class="title">Toute les opérations faites par le patient <?php echo $NP;?></p>
<ul>
<?php

$sql="SELECT * FROM (SELECT * FROM Operation  WHERE Id_Patient = $Patient ORDER BY Id_Op DESC LIMIT 7) sub ORDER BY Id_Op ASC ;";
      
  
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
              </li>
              
              
              
              
              <?php
        
        
      }






?>
    </ul>

</div>



</section>




  
<?php
include "footer.php";
?>