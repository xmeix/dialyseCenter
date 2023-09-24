<?php
  include "header.php";

  if(!isset($_SESSION)){
    session_start();
    
   
} 
$Patient=$_SESSION["user_Id"];


  
include_once "../../src/includes/DataBaseConn.php";
include_once "includes/FonctionReg.php";

?>

<section class="Part-Four">

 <div class="Regime-Container">
     
     <p class="titre-r">
        votre régime alimentaire conseillé par votre medecin
     </p>
     <div class="Reg">
         <div class="Auto">
             <p class="Yes">Aliments autorisé</p>
             <div class="lPAuto">
             <ul>
                 <?php
                     $result=GetAuto($conn,$Patient,0);
                     while($row=mysqli_fetch_assoc($result)){
                         $Aliment=$row['Aliment'];
                         
                         ?>
                         <li><?php echo $Aliment;?></li>
                         
                         <?php
                     }
                 
                 
                 ?>
                 </ul>
             </div>
            

         </div>
         <div class="Pas-Auto">
             <p class="No">Aliments pas autorisé</p>
             <div class="lAuto">
             <ul>
                 <?php
                     $result=GetAuto($conn,$Patient,1);
                     while($row=mysqli_fetch_assoc($result)){
                         $Aliment=$row['Aliment'];
                         
                         ?>
                         <li><?php echo $Aliment;?></li>
                         
                         <?php
                     }
                 
                 
                 ?>
                 </ul>
             </div>
             
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




</section>




  
<?php
include "footer.php";
?>