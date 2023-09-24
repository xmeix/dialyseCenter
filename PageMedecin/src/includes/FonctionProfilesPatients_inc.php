<?php

function PatientAMedecin($conn,$Medecin){

    $sql="SELECT DISTINCT Patient_Id FROM Affectation WHERE  Staff_Id = ?;";

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ProfilesPatients.php?Error=stmtError");
                    exit();
                }
                
                mysqli_stmt_bind_param($stmt,"i",$Medecin);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;

}


function InfoUser($conn,$Patient){
    $sql="SELECT * FROM users WHERE  user_Id = ?;";

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ProfilesPatients.php?Error=stmtError");
                    exit();
                }
                
                mysqli_stmt_bind_param($stmt,"i",$Patient);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;
}


function ShowTimes($conn,$Medecin,$Patient,$Date1,$Date2){

    $sql="SELECT * FROM SeancesEdt   WHERE  Id_Medecin= ? AND Id_Patient=? AND Date_Seance BETWEEN ? AND ? ORDER BY Date_Seance Asc;";


    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ProfilesPatients.php?Error=stmtError");
                    exit();
                }
                
                mysqli_stmt_bind_param($stmt,"iiss",$Medecin,$Patient,$Date1,$Date2);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;
}