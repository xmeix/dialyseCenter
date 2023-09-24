<?php
  include "header.php";
  

  if(!isset($_SESSION)){
    session_start();
}
$Medecin=$_SESSION["user_Id"];

?>

<section class="Part-two">
    
    <div class="wrap-list-for-patients" id="WrapListPat">
                  <p class="title">Mes patients</p>


            <div class="patients-list">
              <div class="list-title">
                <p>Appuyez sur le nom du patient pour afficher son profil, sinon sur l'icone pour afficher les horraires des séances </p>
              </div>
              <center><form action="includes/SopP.php" method="post" class="search-Bar">
                  <input type="text" name='searchVP' aria-labeledby="search value" placeholder="search for ...">
                  <center><button type="submit" name="SearchP"><i class="fas fa-search"></i></button>
                  <button type="submit" name="Reload"><i class="fas fa-undo-alt"></i></button>
              </center></center>
              <?php

                    include_once "../../src/includes/DataBaseConn.php";
                    include_once "includes/FonctionProfilesPatients_inc.php";
                    
                    if(!isset($_GET['searchValueP'])){
                      
                      $result=PatientAMedecin($conn,$Medecin);
                      $check="yes";
                  
                  }else{
                        $check="No";
                        
                    include_once "../../PageAdmin/src/includes/FonctionSop.php";
                    $searchVP=$_GET['searchValueP'];
                    if($searchVP==""){ 
                        $result=false;
                    }else{
                    
                        $result=searchForP($conn,$searchVP,$Medecin);
                        
                    }
                    
                  
                  }

                  if($result!==false){
                    
                    while($row=mysqli_fetch_assoc($result)){
                        $Patient=$row['Patient_Id'];
                        
                        $result2= InfoUser($conn,$Patient);
                        
                        
                                    echo "<ul>";
                                    
                                    
                                    while($row2=mysqli_fetch_assoc($result2)){

                                        $userNom=$row2["user_Nom"];
                                        $userPrenom=$row2["user_Prenom"];
                                        $userUsername=$row2['user_Username'];
                                        
                                        echo "<a class='link1' title=' voir profile' href='ProfilesPatients.php?OP=ShowP&Patient=".$userUsername."&User=".$userNom." ".$userPrenom."'><li id='patient' class='list-elt'>";
                                        echo $userNom." ".$userPrenom;
                                        echo "</li></a><a class='link2' title='voir dates de rendez-vous ' href='ProfilesPatients.php?OP=ShowT&Patient=". $Patient."&User=".$userNom." ".$userPrenom."&Medecin=".$Medecin."'><i class='fas fa-user-clock'></i></a>";
                                        
                                    
                                    }
                                    echo "</ul>";
                                }
                              
                              }else{
                                  if($check=="yes"){
                                   echo "<p class='Message'>Pas de médecins inscrits</p>";
                                   }else{
                                      echo '<p class="error">element pas trouvé</p>';
                                   }
                              }
                    ?>
            </div>
            
        </div>


        
              <?php 
                  if(isset($_GET['OP']))
                  {
                    if($_GET['OP']==="ShowP")
                    {
                      echo '<div class="AffichagePatient">';
                      
                      if(isset($_GET['User'])){

                        $NomPrenom=$_GET['User'];
                        if(isset($_GET['Patient'])){
                          
                              $userUsername=$_GET['Patient'];
                          ?>
                            <p>Profile du patient <?php echo $NomPrenom;?></p>
                            <iframe src="../../PageAdmin/src/Show/PPatient/ShowProfileUser.php?PatientUsername=<?php echo $userUsername;?>" width="100%" >
                            </iframe>

                            
                          <?php

                          }
                       }


                       ?>
                      <style>
                      @media (min-width: 650px) {
                        .Part-two {
                            display: grid;
                            grid-template-columns: 40% 59%;
                            grid-gap: 1%;
                        }}
                      
                      </style>
                      <?php
                echo '</div>';
            }
                  
              
              
              ?>
       
      <?php

        if($_GET['OP']==="ShowT"){
          
          $Date1=date('Y-m-d');
          $Date2=date ('Y-m-d',mktime(0,0,0,date("m"),date("d")+6,date("Y")));
          $Medecin=$_GET['Medecin'];
          $Patient=$_GET['Patient'];
          $NP=$_GET['User'];
          $result=ShowTimes($conn,$Medecin,$Patient,$Date1,$Date2);
          ?>
          <div class="ShowT" >
            <div class="title">Affichage des horaires des séances avec le patient <?php echo $NP;?></div>
            
          <ul>
          
          <?php
          
          
          while($row=mysqli_fetch_assoc($result)){

            $DateS=$row['Date_Seance'];
            $heureS=$row['heure'];

            ?>
                <li> Date :  <?php echo $DateS; ?> vers <?php echo $heureS; ?></li>
            <?php
          }
          
          echo "</ul>";



          ?>
          <style>
          @media (min-width: 650px) {
            .Part-two {
                display: grid;
                grid-template-columns: 40% 59%;
                grid-gap: 1%;
            }}
          
          </style>
          </div>
          <?php

        }
      
      }
      ?>
      
     
</section>
    

    

  
<?php
include "footer.php";
?>