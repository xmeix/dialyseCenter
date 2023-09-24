<?php

function GetAuto($conn,$Medecin,$Patient,$State){
    $sql="SELECT * FROM `Regime` WHERE Id_Patient=? AND Id_Medecin=? AND Etat_Aliment=?;";

    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../RegimePatients.php?Error=stmtError");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"iii",$Patient,$Medecin,$State);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function AddAliment($conn,$Patient,$Medecin,$State,$Aliment){
    $sql="INSERT INTO Regime (Id_Patient,Id_Medecin,Aliment,Etat_Aliment) VALUES (?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../RegimePatients.php?Error=stmtError");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"iisi",$Patient,$Medecin,$Aliment,$State);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    
}

function DeleteReg($conn,$Id){
    $sql="DELETE FROM Regime WHERE Id_Reg=?;";
    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../RegimePatients.php?Error=stmtError");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"i",$Id);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
}