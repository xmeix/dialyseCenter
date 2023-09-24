<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['OP'])){
    if($_GET['OP']==="Delete"){
        include_once "FonctionGOperations_inc.php";
        include_once "../../../src/includes/DataBaseConn.php";
        $OpId=$_GET['OpId'];
        $Patient=$_GET['Patient'];
        $NP=$_GET['NP'];
        $Medecin=$_GET['Medecin'];

        DeleteOperation($conn,$OpId);
        header("location: ../GestionOperations.php?OP=HistO&Patient=".$Patient."&Medecin=".$Medecin."&NP=".$NomPrenom);
        exit();
    }
}