<?php

function invalidUsername($Username){ /////USED
   
    if(!preg_match("/^[a-zA-Z0-9]*$/",$Username)){
        $result=true;
    }
    else{
        $result=false;
    }

    return $result;
}


function invalidMail($Email){ /////USED

    if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
        return true;
    }else return false;
}

function pwdNotMatch($Password,$ConfirmPassword){ /////USED

    if($Password!==$ConfirmPassword){
        return true;
        
    }else return false;
}


function pwdNotStrong($Password){  /////USED

    if(strlen($_POST["Password"]) <= 7){
       
        return "Pass1";
    }
   if(!preg_match("#[0-9]+#",$Password)) {
       
   return "Pass2"; 

    }
   
   if(!preg_match("#[A-Z]+#",$Password)) {
     return "Pass3"; 
   }
    if(!preg_match("#[a-z]+#",$Password)) {
     return "Pass4"; 
   }

   return false;



}

function InvalidPhoneNumber($Ntel){ /////USED
    
    if(preg_match('/^\d{10}$/', $Ntel))
    {
        return false;
     }
     return true;
}

function InvalidNSS($NSS){ 
    
    if(preg_match('/^\d{12}$/', $NSS))
    {
        return false;
     }
     return true;
}

function UsernameExists($conn,$Username){ /////USED

    $sql="SELECT * FROM users WHERE user_Username  = ? OR user_Email = ?;";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../PageSignUp.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$Username,$Username);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;

    }else{
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


/////USED//////
function loginUser($conn,$Userormail,$Password)
{

    $uidExists = UsernameExists ($conn,$Userormail);
    if($uidExists===false)
    {
        header('Location:../PageSignUp.php?Error=wrongUseroremail&Page=Two');
        
        exit();
    }
     $PasswordHashed = $uidExists ['user_Password'];
     $checkPassword = password_verify($Password, $PasswordHashed);
     
     
     if($checkPassword===false)
     {
         header("Location:../PageSignUp.php?Error=wrongPassword&Page=Two");
         exit();
     }
     else if($checkPassword ===true)
     {
         session_start();
         $_SESSION["user_Id"]=$uidExists["user_Id"];
         $_SESSION["user_Username"]=$uidExists["user_Username"];
        
         header("Location:../FirstEnterUser.php");
         exit();
     }
    
}


/////USED//////
function createUser($conn,$Nom,$Prenom,$DateNaiss,$LieuNaiss, $Ntel, $Genre,$Email,$Username,$Password, $Type) 
{

    $sql="INSERT INTO users (user_Nom,user_Prenom,user_DateNaiss	,user_LieuNaiss	,user_Genre	,user_Email	,user_Username	,user_Ntel	,user_Password	,user_Type) VALUES (?,?,?,?,?,?,?,?,?,?) ;";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../PageSignUp.php?Error=stmtError");
        exit();
    }

    $HashedPassword=password_hash($Password,PASSWORD_DEFAULT);
   
    mysqli_stmt_bind_param($stmt,"ssssssssss",$Nom,$Prenom,$DateNaiss,$LieuNaiss,$Genre,$Email, $Username ,$Ntel,$HashedPassword, $Type);
    mysqli_stmt_execute($stmt);
    $Id= mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);


    /*//SEARCH FOR ID
    $sql="SELECT * FROM users WHERE user_Username = ?;";

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../PageSignUp.php?Error=stmtError");
                    exit();
                }
               
                mysqli_stmt_bind_param($stmt,"s",$Username);
                mysqli_stmt_execute($stmt);

                $result=mysqli_stmt_get_result($stmt);
                while($row=mysqli_fetch_assoc($result)){

                    $Id=$row["user_Id"];
                    
                }
    
                mysqli_stmt_close($stmt);*/

                //insserting element into table 

                $sql="INSERT INTO ImageP(ImageP_UserId, ImageP_UserUsername, ImageP_Etat) VALUES (?,?,?);";

                $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../PageSignUp.php?Error=stmtError");
                    exit();
                }
               $state=1;
                mysqli_stmt_bind_param($stmt,"isi",$Id,$Username,$state);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);


                ///////Inserting into Patient Table
                InsertIntoPatient($conn,$Id);

   
}

///USED////
function  InsertIntoPatient($conn,$Id){

    $sql="INSERT INTO Patient(id_Patient) VALUES (?);";

    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../PageSignUp.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$Id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}
///USED////
function GetInfoPatient($conn,$current_user){
    
    $sql="SELECT * FROM Patient WHERE id_Patient = ?";

    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../PageSignUp.php?Error=stmtError");
        exit();
    }
 
    mysqli_stmt_bind_param($stmt,"i",$current_user);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    
    mysqli_stmt_close($stmt);
    return $result;
}
//USED//
function UpdatePatient($conn,$GSang,$MChron,$Id){
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
//USED//
function InsererChamps($conn, $Ntel, $Genre,$Email,$Username,$Password,$GSang,$MChron,$Adresse,$Id){


    $sql="UPDATE users  SET user_Genre =?	,user_Email =?	,user_Username =?,user_Ntel =?,user_Password =?,user_Adresse =? WHERE user_Id = ?;";


    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../../Profile.php?Error=stmtError1");
        exit();
    }

    $HashedPassword=password_hash($Password,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssssssi",$Genre,$Email, $Username ,$Ntel,$HashedPassword,$Adresse,$Id );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    UpdatePatient($conn,$GSang,$MChron,$Id);

    
}
function  InsererChampsWGSC($conn,$Ntel, $Genre,$Email,$Username,$Password,$Adresse,$Id){
    $sql="UPDATE users  SET user_Genre =?	,user_Email =?	,user_Username =?,user_Ntel =?,user_Password =?,user_Adresse =? WHERE user_Id = ?;";


    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../../Profile.php?Error=stmtError2");
        exit();
    }

    $HashedPassword=password_hash($Password,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssssssi",$Genre,$Email, $Username ,$Ntel,$HashedPassword,$Adresse,$Id );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
function WhoIsUsing($conn,$Username){

    $sql="SELECT * FROM users WHERE user_Username = ?;";

    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../PageSignUp.php?Error=stmtError");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"s",$Username);
                mysqli_stmt_execute($stmt);

                $result=mysqli_stmt_get_result($stmt);
                while($row=mysqli_fetch_assoc($result)){

                    $UserType=$row["user_Type"];

                }

                mysqli_stmt_close($stmt);

                return $UserType;

}






///USED////
function createMedecin($conn,$Nom,$Prenom,$DateNaiss,$LieuNaiss, $Ntel, $Genre,$Email,$Username,$Password, $Type,$Sfam,$NSS,$DateRec)
{

    $sql="INSERT INTO users (user_Nom,user_Prenom,user_DateNaiss,user_LieuNaiss	,user_Genre	,user_Email	,user_Username	,user_Ntel	,user_Password	,user_Type) VALUES (?,?,?,?,?,?,?,?,?,?) ;";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../../PageAdmin/src/PageInscriptionMedecins.php?Error=stmtError");
        exit();
    }

    $HashedPassword=password_hash($Password,PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt,"ssssssssss",$Nom,$Prenom,$DateNaiss,$LieuNaiss,$Genre,$Email, $Username ,$Ntel,$HashedPassword, $Type);
    mysqli_stmt_execute($stmt); 
    $Id= mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);


                InsertToStaff($conn,$Id,$Sfam,$NSS,$DateRec);
                InsertToMedecin($conn,$Id);

                //insserting element into table 

                $sql="INSERT INTO ImageP(ImageP_UserId, ImageP_UserUsername, ImageP_Etat) VALUES (?,?,?);";

                $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../../PageAdmin/src/PageInscriptionMedecins.php?Error=stmtError");
                    exit();
                }
               $state=1;
                mysqli_stmt_bind_param($stmt,"isi",$Id,$Username,$state);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                //header("Location: ../../PageAdmin/src/PageInscriptionMedecins.php?Error=none");

   
}
///USED
function InsertToMedecin($conn,$Id){
    $sql="INSERT INTO Medecin (id_Medecin) VALUES (?) ;";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../../PageAdmin/src/PageInscriptionMedecins.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$Id);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt);
}

//USED 
function createInfirmier($conn,$Nom,$Prenom,$DateNaiss,$LieuNaiss, $Ntel, $Genre,$Email,$Type,$Sfam,$NSS,$DateRec)
{

    $sql="INSERT INTO users(user_Nom, user_Prenom,user_Genre,user_DateNaiss,user_LieuNaiss,user_Email, user_Ntel,user_Type
    ) VALUES (?,?,?,?,?,?,?,?);";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../../PageAdmin/src/PageInscriptionMedecins.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssssssss",$Nom,$Prenom,$Genre,$DateNaiss,$LieuNaiss,$Email,$Ntel,$Type);
    mysqli_stmt_execute($stmt);
    

    $last_id = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);

    InsertToStaff($conn,$last_id ,$Sfam,$NSS,$DateRec);
    InsertToInfirmier($conn,$last_id );

}

function InsertToInfirmier($conn,$Id){
    $sql="INSERT INTO Infirmier (id_Infirmier) VALUES (?) ;";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../../PageAdmin/src/PageInscriptionMedecins.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$Id);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt);
}

function InsertToStaff($conn,$SId,$Sfam,$NSS,$DateRec){

    $sql="INSERT INTO Staff_Company(S_Id,NSS, Date_Recrutement,Situation_Fam) VALUES (?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../../PageAdmin/src/PageInscriptionMedecins.php?Error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"isss",$SId,$NSS,$DateRec,$Sfam);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


}