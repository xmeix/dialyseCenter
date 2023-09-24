<?php

    include_once "../../../src/includes/DataBaseConn.php";
    include_once "FonctionGestionAffectation_inc.php";
 
    if(isset($_POST['Affecter'])){
    
    
    $Medecin=mysqli_real_escape_string($conn,$_POST['MedecinId']);
    $Patient=$_GET['Patient'];
    $PNP=$_GET['PNP'];


    Affecter($conn,$Patient,$Medecin);
    header('location: ../GestionAffectation.php?Patient='.$Patient.'&PNP='.$PNP);
    exit();

 }
 if(isset($_POST['Modifier'])){
    
    
    $Medecin=mysqli_real_escape_string($conn,$_POST['MedecinId']);
    $Patient=$_GET['Patient'];
    $PNP=$_GET['PNP'];
    

    echo $Medecin;
    echo $Patient;

    Modifier($conn,$Patient,$Medecin);
    header('location: ../GestionAffectation.php?OP2=Form2&Patient='.$Patient.'&PNP='.$PNP);
    exit();

 }


 


 if(isset($_GET['OP'])){
     if($_GET['OP']=="Delete"){
         
        $Patient=$_GET['Patient'];
        $PNP=$_GET['PNP'];
         DeleteDemande($conn,$Patient);
         header('location: ../GestionAffectation.php?Patient='.$Patient.'&PNP='.$PNP);
         exit();
     }
 }


 if(isset($_GET['OP2'])){
    if($_GET['OP2']=="Delete2"){
        
       $Patient=$_GET['Patient'];
       $PNP=$_GET['PNP'];
        DeleteAffectation($conn,$Patient);
        header('location: ../GestionAffectation.php?Patient='.$Patient.'&PNP='.$PNP);
        exit();
    }
}