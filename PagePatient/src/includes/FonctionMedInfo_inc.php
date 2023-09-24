<?php

function getMedId($conn,$Patient){

    $sql="SELECT * FROM Affectation WHERE Patient_Id = ? ";

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListeStaff.php?Error=stmtError");
                    exit();
                }
                
                mysqli_stmt_bind_param($stmt,"i",$Patient);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                $check = mysqli_num_rows($result);
                if($check>0)return $result;
                else return false;
                mysqli_stmt_close($stmt);

}

