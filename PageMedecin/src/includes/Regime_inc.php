<?php


if(isset($_POST['PA'])){


    include_once "../../../src/includes/DataBaseConn.php";
    include_once "FonctionRegime_inc.php";
$State=1;
$User=$_GET['User'];
$Patient=$_GET['Patient'];
$Medecin=$_GET['Medecin'];
$Aliment=mysqli_real_escape_string($conn,$_POST['Aliment']); 
AddAliment($conn,$Patient,$Medecin,$State,$Aliment);
header("location: ../RegimePatients.php?OP=ShowR&Patient=".$Patient."&User=".$User."&Error=Added");
exit();
}

if(isset($_POST['A'])){
    include_once "../../../src/includes/DataBaseConn.php";
    include_once "FonctionRegime_inc.php";
    $User=$_GET['User'];
    $Patient=$_GET['Patient'];
    $Medecin=$_GET['Medecin'];
    $Aliment=mysqli_real_escape_string($conn,$_POST['Aliment']); 
    $State=0;
    AddAliment($conn,$Patient,$Medecin,$State,$Aliment);
    header("location: ../RegimePatients.php?OP=ShowR&Patient=".$Patient."&User=".$User."&Error=Added");
exit();
}


if(isset($_GET['Delete'])){
    include_once "../../../src/includes/DataBaseConn.php";
    include_once "FonctionRegime_inc.php";
    $Id=$_GET['Delete'];
    $User=$_GET['User'];
    $Patient=$_GET['Patient'];
    DeleteReg($conn,$Id);
    header("location: ../RegimePatients.php?OP=ShowR&Patient=".$Patient."&User=".$User."&Error=Deleted");


}