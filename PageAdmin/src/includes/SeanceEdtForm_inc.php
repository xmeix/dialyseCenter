<?php

if(isset($_POST['AjouterS'])){

    include_once "../../../src/includes/DataBaseConn.php";
    include_once "FonctionGestionDemEdt_inc.php";
    include_once "FonctionSeancesEdt.php";

    
    $Patient=$_GET['Patient'];
    $Medecin=$_GET['Medecin'];
    $DateS=mysqli_real_escape_string($conn,$_POST['DateS']);
    $hours=mysqli_real_escape_string($conn,$_POST['hours']);
    $PNP=$_GET['PNP'];
    $MNP=$_GET['MNP'];

    /**echo $Patient;
    echo $Medecin;
    echo $hours;
    echo $DateS;*/
    $row=ExisteSeance($conn,$Patient,$Medecin,$DateS,$hours);

    if($row!==false){
        
        header("location: ../SeancesEdt.php?Error=SeancePasLibreouLEmedecinpris&OP=Form&Patient=".$Patient."&PNP=".$PNP."&Medecin=".$Medecin."&MNP=".$MNP);
        exit();
       

    }else{
        AddSeance($conn,$Patient,$Medecin,$DateS,$hours);
        header("location: ../SeancesEdt.php?Error=SeanceCreated&OP=Form&Patient=".$Patient."&PNP=".$PNP."&Medecin=".$Medecin."&MNP=".$MNP);
        exit();
    }

}


if(isset($_POST['SupprimerS'])){

    include_once "../../../src/includes/DataBaseConn.php";
    include_once "FonctionGestionDemEdt_inc.php";
    include_once "FonctionSeancesEdt.php";

    $Patient=$_GET['Patient'];
    $Medecin=$_GET['Medecin'];
    $DateS=mysqli_real_escape_string($conn,$_POST['DateS']);
    $hours=mysqli_real_escape_string($conn,$_POST['hours']);
    $PNP=$_GET['PNP'];
    $MNP=$_GET['MNP'];

    $row=ExisteSeance($conn,$Patient,$Medecin,$DateS,$hours);

    if($row!==false){

        
            $Seance=$row['Id_Seance_Edt'];

        SupprimerSeance($conn,$Seance);
        header("location: ../SeancesEdt.php?Error=SeanceDeleted&OP=Form&Patient=".$Patient."&PNP=".$PNP."&Medecin=".$Medecin."&MNP=".$MNP);
        exit();

    }else{
        header("location: ../SeancesEdt.php?Error=SeanceDoesntExist&OP=Form&Patient=".$Patient."&PNP=".$PNP."&Medecin=".$Medecin."&MNP=".$MNP);
        exit();
    }

}

