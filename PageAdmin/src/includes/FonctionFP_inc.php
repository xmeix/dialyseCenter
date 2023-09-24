<?php

function CreateFichePaie($conn,$StaffId,$SB,$IEP,$IN,$IDisp,$Panier,$Transport,$Ret)
{
    $sql="INSERT INTO FichePaie (S_Id,Salaire_Base,IND_EXP_PRO,IND_Nuisances,IND_Disponibilite,Panier,Transport, Retenue,Total) VALUES (?,?,?,?,?,?,?,?,?);";

    $Total=$SB+$IEP+$IN+$IDisp+$Panier+$Transport-$Ret;

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListeStaff.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"iiiiiiiii",$StaffId,$SB,$IEP,$IN,$IDisp,$Panier,$Transport,$Ret,$Total);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
}


function ShowHistoriqueFP($conn,$StaffId){

    $sql = "SELECT * FROM FichePaie WHERE S_Id=? ORDER BY FP_Date_Creation DESC ;";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListeStaff.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"i",$StaffId);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;



}

function DeleteFP($conn,$FPId){

    $sql = "DELETE FROM FichePaie WHERE FP_Id=?";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListeStaff.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"i",$FPId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                
}

function GetInfoByFPId($conn,$FPId){
    $sql = "SELECT * FROM FichePaie WHERE FP_Id=?";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListeStaff.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"i",$FPId);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                return $result;
                mysqli_stmt_close($stmt);
}
