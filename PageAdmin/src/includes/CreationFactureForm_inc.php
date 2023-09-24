<?php
if(isset($_POST['Ajouter'])){
    include_once "../../../src/includes/DataBaseConn.php";
    include_once "FonctionFacture_inc.php";

        $userUsername=$_GET['PatientUsername'];
        $Seances_nb= mysqli_real_escape_string($conn,$_POST['Seances_nb']); 
        $Seance_prix= mysqli_real_escape_string($conn,$_POST['Seance_prix']);
        $Soins=mysqli_real_escape_string($conn,$_POST['Soins_additionnels']);
        $userNom=$_GET['UserNom'];
        $userPrenom=$_GET['UserPrenom'];
        $userDateNaiss=$_GET['UserDateNaiss'];
        $userId=$_GET['UserId'];

    if($Soins=="Oui"){
        $SoinsPrix= mysqli_real_escape_string($conn,$_POST['Soins_prix']);
    }else{
        $SoinsPrix=0;
    }
       CreateFacture($conn,$Seances_nb,$Seance_prix,$userId,$userNom,$userPrenom,$userDateNaiss,$SoinsPrix);
        header("location:../ListePatients.php?Function=Facture&Error=Added&UserNom=$userNom&UserPrenom=$userPrenom&UserId=$userId&UserDateNaiss=$userDateNaiss&PatientUsername=$userUsername");
        exit();
    }