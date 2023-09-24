<?php
//USED
function searchFor($conn,$searchV){
    
    $sql="SELECT * FROM users WHERE user_Type = ? AND (user_Nom LIKE ? OR user_Prenom LIKE ? OR CONCAT(user_Prenom,' ',user_Nom) LIKE ? OR CONCAT(user_Nom,' ',user_Prenom) LIKE ?);";

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListePatients.php?Error=stmtError");
                    exit();
                }
                $UserType="patient";
                $SearchV="%".$searchV."%";
                mysqli_stmt_bind_param($stmt,"sssss",$UserType,$SearchV,$SearchV,$SearchV,$SearchV);
                mysqli_stmt_execute($stmt);
                
                $result=mysqli_stmt_get_result($stmt);
                $check = mysqli_num_rows($result);
                mysqli_stmt_close($stmt);
                if($check>0)return $result;
                else return false;
                
                

}
//USED
function searchForS($conn,$searchV,$Type){
    
    $sql="SELECT * FROM users WHERE user_Type = ? AND (user_Nom LIKE ? OR user_Prenom LIKE ? OR CONCAT(user_Prenom,' ',user_Nom) LIKE ? OR CONCAT(user_Nom,' ',user_Prenom) LIKE ?);";

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ListePatients.php?Error=stmtError");
                    exit();
                }
                
                $SearchV="%".$searchV."%";
                mysqli_stmt_bind_param($stmt,"sssss",$Type,$SearchV,$SearchV,$SearchV,$SearchV);
                mysqli_stmt_execute($stmt);
                
                $result=mysqli_stmt_get_result($stmt);
                $check = mysqli_num_rows($result);
                mysqli_stmt_close($stmt);
                if($check>0)return $result;
                else return false;
                
                

}
//USED
function searchForF($conn,$searchV){
    
    $sql="SELECT * FROM Fournitures WHERE Fourniture_nom LIKE ?;";

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../Fourniture.php?Error=stmtError");
                    exit();
                }
                
                $SearchV="%".$searchV."%";
                mysqli_stmt_bind_param($stmt,"s",$SearchV);
                mysqli_stmt_execute($stmt);
                
                $result=mysqli_stmt_get_result($stmt);
                $check = mysqli_num_rows($result);
                mysqli_stmt_close($stmt);
                if($check>0)return $result;
                else return false;
                
                

}

function searchForP($conn,$searchVP,$Medecin){
    
    $sql="SELECT DISTINCT Patient_Id FROM Affectation INNER JOIN users ON users.user_Id=Affectation.Patient_Id WHERE Staff_Id = ? AND (users.user_Nom LIKE ? OR users.user_Prenom LIKE ? OR CONCAT(users.user_Prenom,' ',users.user_Nom) LIKE ? OR CONCAT(users.user_Nom,' ',users.user_Prenom) LIKE ?);";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../ProfilesPatients.php?Error=stmtError");
                    exit();
                }
                
                $SearchVP="%".$searchVP."%";
                mysqli_stmt_bind_param($stmt,"issss",$Medecin,$SearchVP,$SearchVP,$SearchVP,$SearchVP);
                mysqli_stmt_execute($stmt);
                
                $result=mysqli_stmt_get_result($stmt);
                $check = mysqli_num_rows($result);
                mysqli_stmt_close($stmt);
                if($check>0)return $result;
                else return false;
                
                

}