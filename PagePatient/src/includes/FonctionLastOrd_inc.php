<?php


function GetInfoUserOrd($conn,$Patient,$OrdType){

    $sql="SELECT *
    FROM Ordonnance o
    JOIN users u ON u.user_Id =o.id_Patient
    WHERE o.id_Patient=? AND o.Ord_Type = ? ORDER BY Ord_Id DESC";


        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../LastOrd.php?Error=stmtError");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"is",$Patient,$OrdType);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;

}
function GetInfoUserMed($conn,$Medecin){

    $sql="SELECT * From users WHERE user_Id = ? ;";


        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../LastOrd.php?Error=stmtError");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"i",$Medecin);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;

}
function getOrd($conn,$Id){


    $sql="SELECT * FROM Ordonnance o JOIN users u ON u.user_Id =o.id_Patient  WHERE  Ord_Id=?";


        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../LastOrd.php?Error=stmtError");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"i",$Id);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;
}

function OrdExists($conn,$Patient,$Type){
    $sql="SELECT * From Ordonnance WHERE id_Patient = ? AND Ord_Type = ?;";


        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../LastOrd.php?Error=stmtError");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"is",$Patient,$Type);
        mysqli_stmt_execute($stmt);
        $resultData=mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData))
        {
            $result=true;

        }else{
            $result=false;
           
        } 
        mysqli_stmt_close($stmt);
        return $result;
}