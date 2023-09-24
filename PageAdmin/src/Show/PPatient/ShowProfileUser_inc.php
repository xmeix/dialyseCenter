<?php

if(isset($_POST["Enregistrer"]))
{
    ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
    include "../../../../src/includes/DataBaseConn.php";//ON VA SE CONNECTER A la base de données . 
    include_once "../../../../src/includes/Fonctions_inc.php";
    include_once "../../includes/FonctionPatientList_inc.php";
    
    $Nom =mysqli_real_escape_string($conn,$_POST['UserNom']); // $_POST['Nom'];
    $Prenom =mysqli_real_escape_string($conn,$_POST['UserPrenom']);//$_POST['Prenom'];
    $DateNaiss=mysqli_real_escape_string($conn,$_POST['UserDateNaiss']);//
    $LieuNaiss=mysqli_real_escape_string($conn,$_POST['UserLieuNaiss']);
    $Ntel=mysqli_real_escape_string($conn,$_POST['UserNtel']);
    $Genre=mysqli_real_escape_string($conn,$_POST['Genre']);
    $Adresse= mysqli_real_escape_string($conn,$_POST["UserAdresse"]);
    $GSang= mysqli_real_escape_string($conn,$_POST["GSang"]);
    $MChro= mysqli_real_escape_string($conn,$_POST["UserMChron"]);
    $MChr=str_replace(array('\n','\r'," "), array("","",""), $MChro);
    $MCr=stripslashes($MChr);
    $MChron=trim($MCr);
    
    if(isset($_GET['PatientUsername'])){
        $Patient=$_GET['PatientId'];
        $Username=$_GET['PatientUsername'];
        if(InvalidPhoneNumber($Ntel)!==false)
        {
            //echo $Genre." ".$Email." ".$Ntel." ".$GSang." ".$MChron." ".$Adresse." ".$Nom." ".$Prenom." ".$DateNaiss." ".$LieuNaiss." ".$Username;

            header("location: ShowProfileUser.php?Modif=InvalidPhoneNumber&PatientUsername=$Username");
        exit();

        }else{
        //echo $Genre." ".$Email." ".$Ntel." ".$GSang." ".$MChron." ".$Adresse." ".$Nom." ".$Prenom." ".$DateNaiss." ".$LieuNaiss." ".$Username;
        InsererChampsWithoutPass($conn,$Genre,$Ntel,$GSang,$MChron,$Adresse,$Nom,$Prenom,$DateNaiss,$LieuNaiss,$Username,$Patient);

            $NomPrenom=$Nom."".$Prenom;
            //echo "ShowProfileUser.php?Modif=success&Username=$Username";
            header("location: ShowProfileUser.php?Modif=success&PatientUsername=$Username");
            exit();
        }
    }

}