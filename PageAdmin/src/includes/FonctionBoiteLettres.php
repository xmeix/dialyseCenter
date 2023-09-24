<?php

function getMessages($conn){
    $sql = "SELECT * FROM ContactHP";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../BoiteLettres.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                
                mysqli_stmt_close($stmt);
                return $result;
}

function DeleteMsg($conn,$CId){
    $sql = "DELETE FROM ContactHP WHERE Contact_Id=?;";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../BoitesLettres.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"i",$CId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
}