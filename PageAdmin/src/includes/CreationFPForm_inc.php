<?php


   
if(isset($_POST['Creer'])){
    include_once "../../../src/includes/DataBaseConn.php";
    include_once "FonctionFP_inc.php";
 ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
        echo "HERE";
        $StaffId=$_GET['StaffId'];
        $SB= mysqli_real_escape_string($conn,$_POST['SB']); 
        $IEP= mysqli_real_escape_string($conn,$_POST['IEP']);
        $IN=mysqli_real_escape_string($conn,$_POST['IN']);
        $IDisp=mysqli_real_escape_string($conn,$_POST['IDisp']);
        $Panier=mysqli_real_escape_string($conn,$_POST['Panier']);
        $Transport=mysqli_real_escape_string($conn,$_POST['Transport']);
        $Ret=mysqli_real_escape_string($conn,$_POST['Ret']);

        $StaffNom=$_GET['StaffNom'];
        $StaffPrenom=$_GET['StaffPrenom'];
       CreateFichePaie($conn,$StaffId,$SB,$IEP,$IN,$IDisp,$Panier,$Transport,$Ret);
        header("location:../ListeStaff.php?Function=FP&Error=Added&StaffId=$StaffId&StaffNom=$StaffNom&StaffPrenom=$StaffPrenom");
        exit();
    }