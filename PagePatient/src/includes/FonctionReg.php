<?php



function GetAuto($conn,$Patient,$State){
    $sql="SELECT * FROM `Regime` WHERE Id_Patient=? AND Etat_Aliment=?;";

    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../RegimePatients.php?Error=stmtError");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"ii",$Patient,$State);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}