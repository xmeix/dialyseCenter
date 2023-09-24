<?php
  include "header.php";
  
  if(!isset($_SESSION)){
    session_start();
    }

   

?>


<section class="BLL">
    <p class="intro">boite aux lettres</p>

    <ul>
    <?php 
    
    include_once "../../src/includes/DataBaseConn.php";
    include_once "includes/FonctionBoiteLettres.php";
    $result=getMessages($conn);

    while($row=mysqli_fetch_assoc($result)){
        
        $Nom=$row['Nom'];
        $Prenom=$row['Prenom'];
        $Email=$row['Email'];
        $Message=$row['Message'];
        $Date=$row['Contact_Date'];
        $CId=$row['Contact_Id']

        ?>
        <li class="Bmsg">
            <div class="wrap">
            <p class="NomPrenom"><?php echo $Nom." ".$Prenom; ?></p>
            <p class="Email"><?php echo $Email; ?></p>
            <p class="message"><?php echo $Message; ?></p>
            <p class="Date"><?php echo $Date; ?></p>
            </div>

            <a title='Supprimer message' href="BoiteLettresOperations.php?OP=Delete&CId=<?php echo $CId;?>" ><i class="fas fa-backspace"></i></a>
        </li>
        
        <?php

        
    }
    
    
    ?>
    </ul>
</section>












<?php
include "footer.php";
?>