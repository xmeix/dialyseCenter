<?php

//Va retourner la liste des patients accepté par l administrateur et qui n'ont pas encore un meedecin affecté
function VerifyNonAffected($conn){
    $sql="SELECT * FROM users INNER JOIN Demandes_Edt ON Demandes_Edt.Id_Patient=users.user_Id AND Demandes_Edt.Etat_Dem=1 WHERE NOT EXISTS (SELECT * FROM Affectation WHERE Patient_Id = Demandes_Edt.Id_Patient );";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../GestionAffectation.php?Error=stmtError");
        exit();
    }
   
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
     mysqli_stmt_close($stmt);
     return $result;
}

//tous les medecins du centre 
function AllMed($conn){ 
    $sql="SELECT * FROM users WHERE user_Type=?";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../GestionAffectation.php?Error=stmtError");
        exit();
    }
   $userType="Medecin";
    mysqli_stmt_bind_param($stmt,"s",$userType);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
     mysqli_stmt_close($stmt);
     return $result;
}

function Affecter($conn,$Patient,$Medecin){
    $sql="INSERT INTO Affectation (Staff_Id,Patient_Id) VALUES (?,?);";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../GestionAffectation.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ii",$Medecin,$Patient);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
     
}
function Modifier($conn,$Patient,$Medecin){
    $sql="UPDATE Affectation SET Staff_Id= ? WHERE Patient_Id=?;";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../GestionAffectation.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ii",$Medecin,$Patient);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function  DeleteDemande($conn,$Patient){
    $sql="DELETE FROM Demandes_Edt WHERE Id_Patient=? AND Etat_Dem=?;";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../GestionAffectation.php?Error=stmtError");
        exit();
    }
    $Etat=1;

    mysqli_stmt_bind_param($stmt,"ii",$Patient,$Etat);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
function  DeleteAffectation($conn,$Patient){
    $sql="DELETE FROM Affectation WHERE Patient_Id=? ";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../GestionAffectation.php?Error=stmtError");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"i",$Patient);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function VerifyAffected($conn){
    $sql="SELECT * FROM users INNER JOIN Affectation ON Affectation.Patient_Id=users.user_Id ;";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../GestionAffectation.php?Error=stmtError");
        exit();
    }
   
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
     mysqli_stmt_close($stmt);
     return $result;

}

function getInfo($conn,$Medecin){
    $sql="SELECT * FROM `users` WHERE user_Id=?;";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../GestionAffectation.php?Error=stmtError");
        exit();
    }
    $Etat=1;

    mysqli_stmt_bind_param($stmt,"i",$Medecin);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
     mysqli_stmt_close($stmt);
     return $result;
}