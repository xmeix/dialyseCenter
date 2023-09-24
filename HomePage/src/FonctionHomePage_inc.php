<?php

function SendMessageToAdmin($conn,$Nom,$Prenom,$Email,$Message){


    $sql = "INSERT INTO ContactHP (Nom, Prenom, Email,Message) VALUES (?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListePatients.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"ssss",$Nom,$Prenom,$Email,$Message);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);



}