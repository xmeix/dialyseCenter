<?php

if(isset($_POST["submit"]))
{
    
    include_once "DataBaseConn.php";//ON VA SE CONNECTER A la base de données . 
    include_once "Fonctions_inc.php";


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
    $Type="patient";

    if(invalidUsername($Username)!==false){
        header("location: ../PageSignUp.php?Error=invalidUsername&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email");
        exit();
    }

    if(invalidMail($Email)!==false){
        header("location: ../PageSignUp.php?Error=invalidMail&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Username=$Username");
        exit();
    }
    
   if(InvalidPhoneNumber($Ntel)!==false)
    {
        header("location: ../PageSignUp.php?Error=InvalidPhoneNumber&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Genre=$Genre&Username=$Username&Email=$Email");
        exit();

    }

    if(pwdNotMatch($Password,$ConfirmPassword)!==false){
        header("location: ../PageSignUp.php?Error=passIncompat&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email&Username=$Username");
        exit();
    }

    if($Pns=pwdNotStrong($Password)){
        if($Pns==="Pass1") 
        {
            header("location: ../PageSignUp.php?Error=Pass1&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email&Username=$Username");
            exit();
        }  
        if($Pns==="Pass2") 
        {
            header("location: ../PageSignUp.php?Error=Pass2&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email&Username=$Username");
            exit();
        }
        if($Pns==="Pass3") 
        {
            header("location: ../PageSignUp.php?Error=Pass3&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email&Username=$Username");
            exit();
        }
        if($Pns==="Pass4") 
         {
            header("location: ../PageSignUp.php?Error=Pass4&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email&Username=$Username");
            exit();
        }
        
    }
    if(UsernameExists($conn,$Username)!==false){
            header("location: ../PageSignUp.php?Error=UsernameAlreadyExists&Nom=$Nom&Prenom=$Prenom&DateNaiss=$DateNaiss&LieuNaiss=$LieuNaiss&Ntel=$Ntel&Genre=$Genre&Email=$Email");
            exit();
        }



     createUser($conn,$Nom,$Prenom,$DateNaiss,$LieuNaiss, $Ntel, $Genre,$Email,$Username,$Password,$Type);
     header("Location: ../PageSignUp.php?Error=none");
     exit();




}else{
    header("location: ../PageSignUp.php");
    exit();
}