<?php


if(isset($_POST['Ajouter'])){

    include_once "../../../src/includes/DataBaseConn.php";//ON VA SE CONNECTER A la base de données . 
    include_once "../../../src/includes/Fonctions_inc.php";

   
    $Nom =mysqli_real_escape_string($conn,$_POST['Nom']); // $_POST['Nom'];
    $Prenom =mysqli_real_escape_string($conn,$_POST['Prenom']);//$_POST['Prenom'];
    $DateNaiss=mysqli_real_escape_string($conn,$_POST['DateNaiss']);//
    $LieuNaiss=mysqli_real_escape_string($conn,$_POST['LieuNaiss']);
    $Ntel=mysqli_real_escape_string($conn,$_POST['Ntel']);
    $Genre=mysqli_real_escape_string($conn,$_POST['Genre']);
    $Email=mysqli_real_escape_string($conn,$_POST['Email']);//$_POST['email'];
    $Username=mysqli_real_escape_string($conn,$_POST['Username']);//$_POST['usernameid'];
    $Password=mysqli_real_escape_string($conn,$_POST['Password']);//$_POST['password']
    $ConfirmPassword = mysqli_real_escape_string($conn,$_POST["ConfirmPassword"]);
    $Type=mysqli_real_escape_string($conn,$_POST["Type"]);
    $Sfam=mysqli_real_escape_string($conn,$_POST["Sfam"]);
    $NSS=mysqli_real_escape_string($conn,$_POST["NSS"]);
    $DateRec=mysqli_real_escape_string($conn,$_POST["DateRec"]);

    if(invalidMail($Email)!==false){
        header("location: ../PageInscriptionMedecins.php?Error=invalidMail&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre");
        exit();
    }
    if(InvalidPhoneNumber($Ntel)!==false)
    {
        header("location:  ../PageInscriptionMedecins.php?Error=InvalidPhoneNumber&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Genre=$Genre&Email=$Email");
        exit();

    }

    if(InvalidNSS($NSS)!==false){
        header("location: ../PageInscriptionMedecins.php?Error=invalidNSS&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email");
        exit();
    }

    if($Type=='Medecin'){

        if(invalidUsername($Username)!==false){
            header("location: ../PageInscriptionMedecins.php?Error=invalidUsername&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email");
            exit();
        }
        if(UsernameExists($conn,$Username)!==false){
            header("location: ../PageInscriptionMedecins.php?Error=UsernameAlreadyExists&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email");
            exit();
        }
        if(pwdNotMatch($Password,$ConfirmPassword)!==false){
            header("location: ../PageInscriptionMedecins.php?Error=passIncompat&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email&Username=$Username");
            exit();
        }
    
        if($Pns=pwdNotStrong($Password)){
            if($Pns==="Pass1") 
            {
                header("location: ../PageInscriptionMedecins.php?Error=Pass1&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email&Username=$Username");
                exit();
            }  
            if($Pns==="Pass2") 
            {
                header("location: ../PageInscriptionMedecins.php?Error=Pass2&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email&Username=$Username");
                exit();
            }
            if($Pns==="Pass3") 
            {
                header("location: ../PageInscriptionMedecins.php?Error=Pass3&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email&Username=$Username");
                exit();
            }
            if($Pns==="Pass4") 
             {
                header("location: ../PageInscriptionMedecins.php?Error=Pass4&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email&Username=$Username");
                exit();
            }
            
        }
        
        createMedecin($conn,$Nom,$Prenom,$DateNaiss,$LieuNaiss, $Ntel, $Genre,$Email,$Username,$Password,$Type,$Sfam,$NSS,$DateRec);

        header("location: ../PageInscriptionMedecins.php?Error=MedecinAdded");
        exit();

    }elseif($Type=='Infirmier'){

        createInfirmier($conn,$Nom,$Prenom,$DateNaiss,$LieuNaiss, $Ntel, $Genre,$Email,$Type,$Sfam,$NSS,$DateRec);
        header("location: ../PageInscriptionMedecins.php?Error=InfirmierAdded");
        exit();

        


    }



}elseif(isset($_POST['Annuler']))
{

}