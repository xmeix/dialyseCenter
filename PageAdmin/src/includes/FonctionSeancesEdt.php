<?php

function AllPatAccepted($conn){
    $sql="SELECT * FROM users INNER JOIN Demandes_Edt ON Demandes_Edt.Id_Patient=users.user_Id AND Demandes_Edt.Etat_Dem=?";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../SeancesEdt.php?Error=stmtError");
        exit();
    }
   $Etat_Dem=1;
    mysqli_stmt_bind_param($stmt,"i",$Etat_Dem);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
     mysqli_stmt_close($stmt);
     return $result;
}

function EraseEdt($conn,$Patient){
    $sql="DELETE  FROM SeancesEdt WHERE Id_Patient = ? ;";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../SeancesEdt.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$Patient);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}


function AddSeance($conn,$Patient,$Medecin,$DateS,$heureS)
{
    $sql="INSERT INTO SeancesEdt (heure,Date_Seance,Id_Medecin,Id_Patient) VALUES (?,?,?,?);";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../SeancesEdt.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssii",$heureS,$DateS,$Medecin,$Patient);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    

}

function ExisteSeance($conn,$Patient,$Medecin,$DateS,$hours){
    
    //si le medecin a une seance en tel heure tel date avec un patient 
    //si le patient a une seance tel heure tel date avec un medecin
    $sql="SELECT * FROM SeancesEdt WHERE Id_Medecin = ? AND Date_Seance = ? AND heure= ? OR  Id_Medecin= ? AND Date_Seance = ? AND heure = ? ;";
    //header("Location: ../SeancesEdt.php?Error=".$sql);

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../SeancesEdt.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ississ",$Medecin,$DateS,$hours,$Medecin,$DateS,$hours);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;

    }else{
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);


}

function  UpdateSeance($conn,$Seance,$Patient,$Medecin,$DateS,$hours){

    //S IL YA LE PATIENT DONC MODIFIER ET DONNER LA DATE A UNE AUTRE PERSONNE
    $sql="UPDATE SeancesEdt SET heure=?,Date_Seance=?,Id_Medecin=?,Id_Patient=? WHERE Id_Seance_Edt=?;";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../SeancesEdt.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssiii",$hours,$DateS,$Medecin,$Patient,$Seance);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}


function SupprimerSeance($conn,$Seance){
    $sql="DELETE FROM SeancesEdt WHERE Id_Seance_Edt=?;";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../SeancesEdt.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$Seance);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function SupprimerEdtByPat($conn,$Patient){
    $sql="DELETE FROM SeancesEdt WHERE Id_Patient=?;";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../SeancesEdt.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$Patient);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function SupprimerDemandeByPat($conn,$Patient)
{
    $sql="DELETE FROM Demandes_Edt WHERE Id_Patient=? AND Etat_Dem=?;";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../SeancesEdt.php?Error=stmtError");
        exit();
    }

    $State=1;
    mysqli_stmt_bind_param($stmt,"ii",$Patient,$State);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}


