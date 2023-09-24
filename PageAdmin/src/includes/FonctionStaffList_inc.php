<?php
function RowInfoStaff($conn){

    $sql="SELECT * FROM users WHERE user_Type=? or user_Type=? ;";

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListeStaff.php?Error=stmtError");
                    exit();
                }
                $type1="Infirmier";
                $type2="Medecin";
                mysqli_stmt_bind_param($stmt,"ss",$type1,$type2);
                mysqli_stmt_execute($stmt);

                $result=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;
}

function RowInfoS($conn,$Type){

    $sql="SELECT * FROM users WHERE user_Type = ? ;";

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


function GetInfoById($conn,$StaffId){
    $sql="SELECT * FROM users WHERE user_Id=? ;";

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

function GetInfoStaffById($conn,$StaffId){
    $sql="SELECT * FROM Staff_Company WHERE S_Id=?;";

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

//USED
function InsererChampsWithoutPassUsingUserId($conn,$Genre,$Ntel,$Adresse,$Nom,$Prenom,$DateNaiss,$LieuNaiss,$StaffId,$NSS,$DateRec,$Sfam){

    $sql="UPDATE users  SET user_Genre =?,user_Ntel =?,user_Adresse =? , user_Nom=? , user_Prenom=? ,user_DateNaiss=?,user_LieuNaiss=? WHERE user_Id = ?;";


    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../Show/PStaff/ShowProfileStaff.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssssssi",$Genre,$Ntel,$Adresse,$Nom,$Prenom,$DateNaiss,$LieuNaiss,$StaffId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    UpdateChampsStaffC($conn,$StaffId,$NSS,$DateRec,$Sfam);
}
//USED
function UpdateChampsStaffC($conn,$StaffId,$NSS,$DateRec,$Sfam)
{
    $sql="UPDATE Staff_Company SET NSS=?,Date_Recrutement=?, Situation_Fam=? WHERE S_Id=? ;";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../Show/PStaff/ShowProfileStaff.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssi",$NSS,$DateRec,$Sfam,$StaffId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
//USED
function DeleteUserbyId($conn,$StaffId,$StaffType){
    $sql = "DELETE FROM users WHERE user_Id=?;";
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

                


}


//USED
function WhoIsUsingbyId($conn,$Id){

    $sql="SELECT * FROM users WHERE user_Id = ?;";

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../PageSignUp.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"i",$Id);
                mysqli_stmt_execute($stmt);

                $result=mysqli_stmt_get_result($stmt);
                while($row=mysqli_fetch_assoc($result)){

                    $UserType=$row["user_Type"];

                }

                mysqli_stmt_close($stmt);

                return $UserType;

}