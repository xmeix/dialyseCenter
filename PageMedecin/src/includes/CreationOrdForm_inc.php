<?php

if(isset($_POST['Create'])){
    include_once "../../../src/includes/DataBaseConn.php";
    include_once "FonctionOrdonnancePatients_inc.php";
    
    $Patient=$_GET['Patient'];
    $Medecin=$_GET['Medecin'];
    $TypeO=mysqli_real_escape_string($conn,$_POST['OrdType']); 
    $DescO=mysqli_real_escape_string($conn,$_POST['OrdDescription']); 


    CreateOrdonnance($conn,$Medecin,$Patient,$TypeO,$DescO);
    header('location: ../OrdonnancePatients.php?Error=OCreated');
    exit();

}

