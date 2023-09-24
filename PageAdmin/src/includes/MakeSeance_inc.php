<?php

if(isset($_POST['AjouterS'])){

    include_once "../../../src/includes/DataBaseConn.php";
    include_once "FonctionGestionDemEdt_inc.php";

    $Patient=$_GET['Patient'];
    $Medecin=$_GET['Medecin'];
    $Demande=$_GET['Demande'];
    $DateS=mysqli_real_escape_string($conn,$_POST['DateS']);
    $hours=mysqli_real_escape_string($conn,$_POST['hours']);

    $result=ExisteSeance($conn,$Patient,$Medecin,$DateS,$hours);
    if($result==false)//no row found
    {
        CreateSeance($conn,$Patient,$Medecin,$DateS,$hours,$Demande);
        header('location: ../GestionDemEdt.php?Error=ACCEPTEDSUCCESS&OP=Accept&ShowListMed=true&ShowForm=true&PatientNom='.$PatientNom.'&PatientPrenom='.$PatientPrenom.'&PatientId='.$Patient.'&MedId='.$Medecin.'&Demande='.$Demande.'&DateS='.$DateS.'&Hours='.$hours);
    }else{
        header('location: ../GestionDemEdt.php?Error=SEANCEPASVIDE&OP=Accept&ShowListMed=true&ShowForm=true&PatientNom='.$PatientNom.'&PatientPrenom='.$PatientPrenom.'&PatientId='.$Patient.'&MedId='.$Medecin.'&Demande='.$Demande);
    }
}
