<?php
  
  if(!isset($_SESSION)){
    session_start();
    }
?>

<?php
include "header.php";

include "../../src/includes/DataBaseConn.php";
?>

<section class="Part-Six" id="PartSix">
      <div class="titre">Fournitures médicales du centre</div>
      
    <div class="Container">
    
          <center>
            <div class="Fourniture-Elements">
            <p class="ajout-mat-titre">Ajout d'un nouveau matériel</p>
            <p class="ajout-mat-sous-titre">Vous devez remplir les champs si dessous pour l'ajout d un nouveau matériel.</p>
            
            <form action="includes/FournitureForm_inc.php" class="FournitureForm" method="POST">
                  
                  <label for="FourName">Nom matériel:</label>
                  <div class="element">
                  <i class="fas fa-microscope"></i>
                    <input type="text" name="NomFourn" placeholder="Nom matériel" required>
                  </div>
                  <label for="QteFourn">Quantité:</label>
                  <div class="element">
                    <div class="element">

                    <i class="fas fa-sort-numeric-up-alt"></i>
                    <input type="number"  min="0" name="QteFourn" placeholder="Quantité Disponible" required>
                    </div>
                  </div>

                  <center>
                  <button type="submit" name="Enregistrer">Enregistrer</button>
                  <button type="reset" name="Annuler" >Annuler</button>
                    </center>           
            </form>
            <div class="MessageEnreg">
            <?php

            if(isset($_GET['Error'])){
              if($_GET['Error']=="Finserted"){
                echo "<p class='success'>Insertion avec succés.</p>";
              }elseif($_GET['Error']=="FalreadyExists"){
                echo "<p class='error'>Ce matériel existe deja.Si vous souhaitez rajouter plus de ce matériel , vous devez cliquer sur le bouton + 'plus ' sinon sur - 'moins'.</p>";
              }elseif($_GET['Error']=="reset"){
                echo "<p class='reset'>Insertion Annulée.</p>";
              }
            }
            
            ?>
            </div>
            
          </div></center>
                                    
     <div class="container-right">
        <p class="titre-cont">La table de fournitures</p>
        <center><form action="includes/SopF.php" method="post" class="search-Bar">
                  <input type="text" name='searchVF' aria-labeledby="search value" placeholder="search for ...">
                  <center><button type="submit" name="SearchF"><i class="fas fa-search"></i></button>
                  <button type="submit" name="Reload"><i class="fas fa-undo-alt"></i></button>
              </center>
            </form></center>
        <div class="affichageFourniture">
          <ul>
            <?php
            include_once "includes/FonctionFourniture_inc.php";
            
            if(!isset($_GET['searchValueF'])){
              $result= AfficheFournitures($conn);
              $check="yes";
          
          }else{
              $check="No";
              include_once "includes/FonctionSop.php";
              $searchVF=$_GET['searchValueF'];
              if($searchVF==""){ 
                  $result=false;
              }else{
                  $result=searchForF($conn,$searchVF);
                  }
          
          }

          if($result!==false){
            while($row=mysqli_fetch_assoc($result)){
              $IdF=$row['Fourniture_id'];
              $NomF=$row['Fourniture_nom'];
              $QteF=$row['Fourniture_quantité'];
              ?>
              <div class="elemen">
              <li><?php echo $NomF; ?></li>
              <li><?php echo $QteF ;?></li>
              <li><a title='rajouter Qte fourniture' href="FournituresOperations.php?Operation=Add&IdF=<?php echo $IdF ;?>&QteF=<?php echo $QteF;?>"><i class="fas fa-plus"></i></a></li>
              <li><a title='réduire Qte fourniture' href="FournituresOperations.php?Operation=Rem&IdF=<?php echo $IdF ;?>&QteF=<?php echo $QteF;?>"><i class="fas fa-minus"></i></a></li>
              <li><a title='supprimer fourniture' href="FournituresOperations.php?Operation=Del&IdF=<?php echo $IdF ;?>"><i class="fas fa-trash"></i></a></li>
              
              </div>
              
              <?php
            }
            
            ?>
          </ul>
          <?php
           }else{
            if($check=="yes"){
             echo "<p class='Message'>Pas de Fourniture dans l'inventaire</p>";
             }else{
                echo "<p class='error'>element pas trouvé</p>";
             }
        }
          
        if(isset($_GET['Qte'])){
        if($_GET['Qte']=="+1"){
          echo '<p class="success">Augmentation quantité matériel avec succés</p>';
        
        }elseif($_GET['Qte']=="-1"){
          echo '<p class="success">Réduction quantité matériel avec succés</p>';
        
        }elseif($_GET['Qte']=="deleted"){
          echo '<p class="success">Matériel supprimé avec succés</p>';
        }
        }
        
        ?>
        </div>
        
    </div>
      </div>
    
  </section>

  <?php include "footer.php"; ?>