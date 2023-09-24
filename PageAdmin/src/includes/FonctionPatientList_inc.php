<?php

function RowInfoPatients($conn){
    $sql="SELECT * FROM users WHERE user_Type = ?;";

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListePatients.php?Error=stmtError");
                    exit();
                }
                $UserType="user";
                mysqli_stmt_bind_param($stmt,"s",$UserType);
                mysqli_stmt_execute($stmt);

                $result=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;
}


//USED//
function RowInfoP($conn,$Type){

    $sql="SELECT * FROM users INNER JOIN Patient ON users.user_Id=Patient.id_Patient AND users.user_Type = ?";
    
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListeStaff.php?Error=stmtError");
                    exit();
                }
                
                mysqli_stmt_bind_param($stmt,"s",$Type);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                $check = mysqli_num_rows($result);
                if($check>0)return $result;
                else return false;
                mysqli_stmt_close($stmt);
                
}

function DeleteUser($conn,$Username){

    $sql = "DELETE FROM users WHERE user_Username=?;";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListePatients.php?Error=stmtError");
                    exit();
                }
                
                mysqli_stmt_bind_param($stmt,"s",$Username);
                mysqli_stmt_execute($stmt);

                mysqli_stmt_close($stmt);
               


}


function GetInfoByUsername($conn,$UserUsername){

    $sql="SELECT * FROM users INNER JOIN Patient ON Patient.id_Patient=users.user_Id AND users.user_Username = ?";

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListePatients.php?Error=stmtError3");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"s",$UserUsername);
                mysqli_stmt_execute($stmt);

                $result=mysqli_stmt_get_result($stmt);

                mysqli_stmt_close($stmt);
                return $result;
}

function InsererChampsWithoutPass($conn,$Genre,$Ntel,$GSang,$MChron,$Adresse,$Nom,$Prenom,$DateNaiss,$LieuNaiss,$Username,$Id)
{
    $sql="UPDATE users  SET user_Genre =?,user_Ntel =?	,user_Adresse =? , user_Nom=? , user_Prenom=? ,user_DateNaiss=?,user_LieuNaiss=? WHERE user_Username = ?;";


    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../Show/PPatient/ShowProfileUser.php?Error=stmtError4");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssssssss",$Genre,$Ntel,$Adresse,$Nom,$Prenom,$DateNaiss,$LieuNaiss,$Username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    UpdatePatientt($conn,$GSang,$MChron,$Id);
}

//USED//
function UpdatePatientt($conn,$GSang,$MChron,$Id){
    $sql="UPDATE Patient  SET user_GSang =?	,user_MChron =? WHERE id_Patient = ?;";


    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../../Profile.php?Error=stmtError2");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssi",$GSang,$MChron,$Id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
