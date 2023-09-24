<?php

function CreateFacture($conn,$Seances_nb,$Seance_prix,$userId,$userNom,$userPrenom,$userDateNaiss,$SoinsPrix){

    $Montant=$Seances_nb*$Seance_prix+$SoinsPrix;

    $sql = "INSERT INTO Factures (Patient_Id,Patient_Nom,Patient_Prenom, Patient_DateNaiss, Patient_Seances, Seance_Prix,Frais_Soins, Facture_Montant) VALUES (?,?,?,?,?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListePatients.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"isssiiii",$userId,$userNom,$userPrenom,$userDateNaiss,$Seances_nb,$Seance_prix,$SoinsPrix,$Montant);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);


}

function ShowHistoriqueFactures($conn,$userId){

    $sql = "SELECT * FROM Factures WHERE Patient_Id=? ORDER BY  Facture_Date DESC;";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListePatients.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"i",$userId);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;



}


function DeleteFacture($conn,$FactureId){

    $sql = "DELETE FROM Factures WHERE Facture_Id=?";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListePatients.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"i",$FactureId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                
}

function GetInfoByFactureId($conn,$FactureId){

    $sql = "SELECT * FROM Factures WHERE Facture_Id=?";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListePatients.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"i",$FactureId);
                mysqli_stmt_execute($stmt);
                 $result=mysqli_stmt_get_result($stmt);
                 return $result;
                mysqli_stmt_close($stmt);

}