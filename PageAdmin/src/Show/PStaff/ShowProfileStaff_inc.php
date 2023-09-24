<?php

if(isset($_POST["Enregistrer"]))
{
    
    include_once "../../../../src/includes/DataBaseConn.php";//ON VA SE CONNECTER A la base de données . 
    include_once "../../../../src/includes/Fonctions_inc.php";
    include_once "../../includes/FonctionStaffList_inc.php";
    
    $StaffNom =mysqli_real_escape_string($conn,$_POST['StaffNom']); // $_POST['Nom'];
    $StaffPrenom =mysqli_real_escape_string($conn,$_POST['StaffPrenom']);//$_POST['Prenom'];
    $StaffDateNaiss=mysqli_real_escape_string($conn,$_POST['StaffDateNaiss']);//
    $StaffLieuNaiss=mysqli_real_escape_string($conn,$_POST['StaffLieuNaiss']);
    $StaffNtel=mysqli_real_escape_string($conn,$_POST['StaffNtel']);
    $StaffGenre=mysqli_real_escape_string($conn,$_POST['Genre']);
    $StaffAdresse= mysqli_real_escape_string($conn,$_POST["StaffAdresse"]);
    $NSS=mysqli_real_escape_string($conn,$_POST["NSS"]);
    $DateRec=mysqli_real_escape_string($conn,$_POST["DateRec"]);
    $Sfam=mysqli_real_escape_string($conn,$_POST["Sfam"]);
    //email or username can not change
        if(isset($_GET['StaffId'])){
        $StaffId=$_GET['StaffId'];
        if(InvalidPhoneNumber($StaffNtel)!==false)
        {
            //echo $StaffGenre." ".$StaffEmail." ".$StaffNtel." ".$StaffGSang." ".$StaffMChron." ".$StaffAdresse." ".$StaffNom." ".$StaffPrenom." ".$StaffDateNaiss." ".$StaffLieuNaiss." ".$StaffId;

            header("location: ShowProfileStaff.php?Modif=InvalidPhoneNumber&StaffId=$StaffId");
            exit();

        }
        if(InvalidNSS($NSS)!==false){
            header("location: ShowProfileStaff.php?Modif=InvalidNSS&StaffId=$StaffId");
            exit();
        }
        //echo $Genre." ".$Email." ".$Ntel." ".$GSang." ".$MChron." ".$Adresse." ".$Nom." ".$Prenom." ".$DateNaiss." ".$LieuNaiss." ".$Username;
        InsererChampsWithoutPassUsingUserId($conn,$StaffGenre,$StaffNtel,$StaffAdresse,$StaffNom,$StaffPrenom,$StaffDateNaiss,$StaffLieuNaiss,$StaffId,$NSS,$DateRec,$Sfam);

            //echo "ShowProfileUser.php?Modif=success&Username=$Username";
            header("location: ShowProfileStaff.php?Modif=success&StaffId=$StaffId");
            exit();
        
    }

}