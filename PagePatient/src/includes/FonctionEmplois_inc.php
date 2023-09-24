<?php

function ifDemExists($conn,$Patient_Id){//*

    $sql="SELECT * FROM Demandes_Edt WHERE  Id_Patient=? AND Etat_Dem=?;";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../Emplois.php?Error=stmtError");
        exit();
    }

    $State=0;
    mysqli_stmt_bind_param($stmt,"ii",$Patient_Id,$State);
    mysqli_stmt_execute($stmt);

    $result=mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result))
    {
        return $row['Id_Dem'];

    }else{
        return false;
    }

    mysqli_stmt_close($stmt);

}


function EnvoyerDem($conn,$PatientId){//*

    $sql="INSERT INTO Demandes_Edt (Etat_Dem,Id_Patient) VALUES (?,?)";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../Emplois.php?Error=stmtError");
        exit();
    }
    $etat=0;
    //$date = date('d-m-y h:i:s');
    echo $PatientId;
    
    mysqli_stmt_bind_param($stmt,"ii",$etat,$PatientId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


}

function  SupprimerDem($conn,$PatientId){//*
    $sql="DELETE FROM Demandes_Edt WHERE  Id_Patient=? AND Etat_Dem=?;";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../Emplois.php?Error=stmtError");
        exit();
    }
    $State=0;
    mysqli_stmt_bind_param($stmt,"ii",$PatientId,$State);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}



function AfficheSeance($conn,$PatientId,$heure,$DateS)//affiche Medecin affécté dans cette seance
{
    $sql="SELECT * FROM SeancesEdt WHERE  Id_Patient=? AND heure=? AND DATE(Date_Seance)=?;";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../Emplois.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"iss",$PatientId,$heure,$DateS);
    mysqli_stmt_execute($stmt);

    $result=mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result))
    {
        $MedecinId= $row['Id_Medecin'];
        $Res=GetInfoById($conn,$MedecinId);
        if($ro = mysqli_fetch_assoc($Res)){
            return $ro['user_Nom']." ".$ro['user_Prenom'];
        }else{
            return "ERROOOR";
        }

    }else{
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}


function ifDemAccepted($conn,$Patient_Id){

    $sql="SELECT * FROM Demandes_Edt WHERE  Id_Patient=? AND Etat_Dem=?;";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../Emplois.php?Error=stmtError");
        exit();
    }

    $State=1;
    mysqli_stmt_bind_param($stmt,"ii",$Patient_Id,$State);
    mysqli_stmt_execute($stmt);

    $result=mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result))
    {
        return $row['Id_Dem'];

    }else{
        return false;
    }

    mysqli_stmt_close($stmt);

}