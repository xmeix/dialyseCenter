<?php

function RowInfoDemEdt($conn){
    $sql = "SELECT * FROM Demandes_Edt ;";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../GestionDemEdt.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;
}


function RowInfoDem($conn,$state){
    $sql = "SELECT * FROM Demandes_Edt WHERE Etat_Dem=?;";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../GestionDemEdt.php?Error=stmtError");
                    exit();
                }
                mysqli_stmt_bind_param($stmt,"i",$state);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;
}

function GetInfoPatientById($conn,$DemPatientId){
    $sql = "SELECT * FROM users WHERE user_Id=? ;";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../GestionDemEdt.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"i",$DemPatientId);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;

}

function SupprimerDembyDemId($conn,$DemId){
    $sql="DELETE FROM Demandes_Edt WHERE  Id_Dem=?;";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../GestionDemEdt.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$DemId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);



}

function DeleteSeance($conn,$Pat){
    $sql="DELETE FROM  SeancesEdt WHERE  Id_Patient=?;";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../GestionDemEdt.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$Pat);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function AllMed($conn){ 
    $sql="SELECT * FROM users WHERE user_Type=?";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../GestionDemEdt.php?Error=stmtError");
        exit();
    }
   $userType="Medecin";
    mysqli_stmt_bind_param($stmt,"s",$userType);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
     mysqli_stmt_close($stmt);
     return $result;
}



function ChangeDemandeState($conn,$Demande){//*
    
    $sql="UPDATE Demandes_Edt SET Etat_Dem=? WHERE Id_Dem =?;";
    

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../GestionDemEdt.php?Error=stmtError");
                    exit();
                }

                $State=1;
                mysqli_stmt_bind_param($stmt,"ii",$State,$Demande);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
}

function AlreadyExist($conn,$Patient){
    
    $sql="SELECT * FROM Demandes_Edt WHERE Id_Patient = ? AND Etat_Dem = ?;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../GestionDemEdt.php?Error=stmtError");
        exit();
    }
    $State=1;
    mysqli_stmt_bind_param($stmt,"ii",$Patient,$State);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    return $resultData;

    mysqli_stmt_close($stmt);
                

}