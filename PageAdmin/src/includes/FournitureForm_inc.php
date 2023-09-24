<?php

if(isset($_POST['Enregistrer'])){

    
    include_once "../../../src/includes/DataBaseConn.php";
    include_once "FonctionFourniture_inc.php";
    $N=mysqli_real_escape_string($conn,$_POST['NomFourn']);
    $QteFourn=mysqli_real_escape_string($conn,$_POST['QteFourn']);
  
    $NF=str_replace(array('\n','\r',' '), array("\n","\r"," "), $N);
    $NoF=trim($NF);
    $NomFourn=stripslashes($NoF);
    if(FourniExists($conn,$NomFourn)==false){
        InsererChampsFourniture($conn,$NomFourn,$QteFourn);
        
        header('location: ../Fourniture.php?Error=Finserted');
    }else{
        header('location: ../Fourniture.php?Error=FalreadyExists');
    }
}elseif(isset($_POST['Annuler'])){

    header('location: ../Fourniture.php?Error=reset');
    exit();
}