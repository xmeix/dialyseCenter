<?php

function CreateOperation($conn,$Patient,$Medecin,$PAp,$PAv,$TAp,$TAv){

    $sql="INSERT INTO Operation(Id_Patient, Id_Medecin,Poid_Avant, Poid_Apres, Tension_Avant,Tension_Apres) VALUES (?,?,?,?,?,?);";


        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../GestionOperations.php?Error=stmtError");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"iidddd",$Patient,$Medecin,$PAv,$PAp,$TAv,$TAp);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);

}


function DeleteOperation($conn,$OpId){

    $sql="DELETE FROM Operation WHERE Id_Op=?;";


        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../GestionOperations.php?Error=stmtError");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"i",$OpId);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);

}