<?php
if(isset($_POST['Ajouter'])){

    include_once "../../../src/includes/DataBaseConn.php";
    include_once "FonctionGOperations_inc.php";

    $Medecin=$_GET['Medecin'];
    $Patient=$_GET['Patient'];
    $NP=$_GET['NP'];
    $PAv=mysqli_real_escape_string($conn,$_POST['PAv']);
    $TAv=mysqli_real_escape_string($conn,$_POST['TAv']);
    $PAp=mysqli_real_escape_string($conn,$_POST['PAp']);
    $TAp=mysqli_real_escape_string($conn,$_POST['TAp']);


        CreateOperation($conn,$Patient,$Medecin,$PAp,$PAv,$TAp,$TAv);
        header("location:../GestionOperations.php?OP=CreateO&Patient=".$Patient."&Medecin=".$Medecin."&NP=".$NP."&Error=Added");
        exit();


}