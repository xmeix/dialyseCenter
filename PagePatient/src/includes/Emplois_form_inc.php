<?php



if(isset($_POST['Envoyer'])){
    include_once "FonctionEmplois_inc.php";
    include_once "../../../src/includes/DataBaseConn.php";

    $PatientId=$_GET['PatientId'];
    if(ifDemExists($conn,$PatientId)!==false){
        header("location: ../Emplois.php?Demande=ExisteDeja");
        exit();
    }else{
        EnvoyerDem($conn,$PatientId);
        header("location: ../Emplois.php?Demande=Envoyé");
        exit();
    }

}

if(isset($_POST['Annuler'])){
    include_once "FonctionEmplois_inc.php";
    include_once "../../../src/includes/DataBaseConn.php";

    $PatientId=$_GET['PatientId'];

    if(ifDemExists($conn,$PatientId)===false){//SI DEMANDE EXISTE EN ETAT 0
        header("location: ../Emplois.php?Demande=NoDemandFound");
        exit();
    }else{
        SupprimerDem($conn,$PatientId);
        header("location: ../Emplois.php?Demande=Annulé");
        exit();
    }
    
}