<?php


function GetInfoFac($conn,$Facture){

    $sql="SELECT * FROM  Factures  WHERE Facture_Id=?";


        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../FacLast.php?Error=stmtError");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt,"i",$Facture);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;

}

function FacExists($conn,$Patient){
    $sql="SELECT * From Factures WHERE Patient_Id = ? ;";


    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../LastOrd.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$Patient);
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