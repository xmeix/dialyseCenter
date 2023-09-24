<?php


function GetLastFP($conn,$Medecin,$Id){

    $sql="SELECT *
    FROM users u
    JOIN Staff_Company uc ON u.user_Id =uc.S_Id
    JOIN FichePaie fp ON fp.S_Id=uc.S_Id
    WHERE uc.S_Id= ? AND fp.FP_Id = ? ORDER BY fp.S_Id DESC LIMIT 1";


        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../RegimePatients.php?Error=stmtError");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"ii",$Medecin,$Id);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;

}
function GetInfoStaffUserFP($conn,$Medecin){

    $sql="SELECT *
    FROM users u
    JOIN Staff_Company uc ON u.user_Id =uc.S_Id
    JOIN FichePaie fp ON fp.S_Id=uc.S_Id
    WHERE uc.S_Id= ? ORDER BY fp.S_Id DESC LIMIT 1";


        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../RegimePatients.php?Error=stmtError");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"i",$Medecin);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;

}


function FPExists($conn,$Medecin){

    $sql="SELECT * From FichePaie WHERE S_Id = ? ;";


        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../LastOrd.php?Error=stmtError");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"i",$Medecin);
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