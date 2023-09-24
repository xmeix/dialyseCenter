
<?php 
  if(!isset($_SESSION)){
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php

if(isset($_POST["Enregistrer"]))
{
    
    include_once "../../../src/includes/DataBaseConn.php";//ON VA SE CONNECTER A la base de données . 
    include_once "../../../src/includes/Fonctions_inc.php";

    /*
    $Nom =mysqli_real_escape_string($conn,$_POST['Nom']); // $_POST['Nom'];
    $Prenom =mysqli_real_escape_string($conn,$_POST['Prenom']);//$_POST['Prenom'];
    $DateNaiss=mysqli_real_escape_string($conn,$_POST['DateNaiss']);//
    $LieuNaiss=mysqli_real_escape_string($conn,$_POST['LieuNaiss']);*/
    $Ntel=mysqli_real_escape_string($conn,$_POST['Ntel']);
    $Genre=mysqli_real_escape_string($conn,$_POST['Genre']);
    $Email=mysqli_real_escape_string($conn,$_POST['Email']);//$_POST['email'];
    $Username=mysqli_real_escape_string($conn,$_POST['Username']);//$_POST['usernameid'];
    $Password=mysqli_real_escape_string($conn,$_POST['Password']);//$_POST['password']
    $ConfirmPassword = mysqli_real_escape_string($conn,$_POST["ConfirmPassword"]);
    $Adresse= mysqli_real_escape_string($conn,$_POST["Adresse"]);
  
    

    if(invalidUsername($Username)!==false){
        header("location: ../Profile.php?Error=invalidUsername");
        exit();
    }

    if(invalidMail($Email)!==false){
        header("location: ../Profile.php?Error=invalidMail");
        exit();
    }
    
   if(InvalidPhoneNumber($Ntel)!==false)
    {
        header("location: ../Profile.php?Error=InvalidPhoneNumber");
        exit();

    }

    if(pwdNotMatch($Password,$ConfirmPassword)!==false){
        header("location: ../Profile.php?Error=passIncompat");
        exit();
    }

    if($Pns=pwdNotStrong($Password)){
       if($Pns==="Pass1") 
       {
           header("location: ../Profile.php?Error=Pass1");
        exit();
        }
        if($Pns==="Pass2") 
        {
            header("location: ../Profile.php?Error=Pass2");
            exit();
        }
        if($Pns==="Pass3") 
        {
            header("location: ../Profile.php?Error=Pass3");
            exit();
        }
        if($Pns==="Pass4") 
        {
            header("location: ../Profile.php?Error=Pass4");
            exit();
        }

    }

    


    
     $Id=$_SESSION["user_Id"];

        
    InsererChampsWGSC($conn,$Ntel, $Genre,$Email,$Username,$Password,$Adresse,$Id);
     
     
    header("location: ../Profile.php?Error=none");
    



}