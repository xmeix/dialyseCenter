<?php

function  CreateOrdonnance($conn,$Medecin,$Patient,$TypeO,$DescO){
    $sql = "INSERT INTO  Ordonnance (id_Medecin,id_Patient,Ord_Description,Ord_Type) VALUES (?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../OrdonnancePatients.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"iiss",$Medecin,$Patient,$DescO,$TypeO);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
               
}

function HistoriqueO($conn,$Medecin,$Patient){
    
    $sql = "SELECT * FROM Ordonnance WHERE id_Medecin = ? AND  id_Patient = ? ORDER BY Date_Creation DESC;";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListeStaff.php?Error=stmtError");
                    exit();
                }
                
                mysqli_stmt_bind_param($stmt,"ii",$Medecin,$Patient);
                mysqli_stmt_execute($stmt);

                $result=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;
                
}

function DeleteOperInfo($conn,$OrdId){
    $sql = "DELETE FROM Ordonnance WHERE Ord_Id = ? ;";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListeStaff.php?Error=stmtError");
                    exit();
                }
                
                mysqli_stmt_bind_param($stmt,"i",$OrdId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                
}