<?php

include_once "../../src/includes/DataBaseConn.php";
include_once "includes/FonctionStaffList_inc.php";
include_once "includes/FonctionFP_inc.php";
ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
//CALL FUNCTION THAT DELETE STAFF
if(isset($_GET['StaffDelete']))
{
    $StaffId=$_GET['StaffDelete'];
    $StaffType=WhoIsUsingbyId($conn,$StaffId);
    DeleteUserbyId($conn,$StaffId,$StaffType);
    header("location: ListeStaff.php?Function=FP&Error=StaffDeleted");
    exit();
}


if(isset($_GET['StaffId']))
{
    $StaffId=$_GET['StaffId'];
    $result=GetInfoById($conn,$StaffId);
    
    while($row=mysqli_fetch_assoc($result)){
                
        $StaffId=$row['user_Id'];
        $StaffNom=$row["user_Nom"];
        $StaffPrenom=$row["user_Prenom"];
        $StaffGenre=$row["user_Genre"];
        $StaffDateNaiss=$row["user_DateNaiss"];
        $StaffLieuNaiss=$row["user_LieuNaiss"];
        $StaffEmail=$row["user_Email"];
        $StaffNtel=$row["user_Ntel"];
        $StaffGSang=$row["user_GSang"];
        $StaffMChron=$row["user_MChron"];
        $StaffAdresse=$row["user_Adresse"];
        $StaffType=$row['user_Type'];
        
        if($StaffType=="Medecin"){
            $StaffUsername=$row["user_Username"];
        }


        
    }

    if(isset($_GET['Function']))
    {
              if($_GET['Function']=="FP"){

                    //FROM HISTORIQUE IF DELETE THAN DELETE AND THAN SHOW HISTORIQUE AGAIN
                    if(isset($_GET['FPDelete'])){

                      $FPId=$_GET['FPDelete'];
                      $StaffId=$_GET['StaffId'];
                      DeleteFP($conn,$FPId); 
                    }

                    //FOR SHOWING A CERTAIN FAC
                    if(isset($_GET['FPS'])){
                      if($_GET['FPS']=="Show"){

                      $FPId=$_GET['FPId'];
                      $result2=GetInfoByFPId($conn,$FPId);
                          
                          while($row2=mysqli_fetch_assoc($result2)){
                            $FPDate=$row2['FP_Date_Creation'];
                            $SB=$row2['Salaire_Base'];
                            $IEP=$row2['IND_EXP_PRO'];
                            $IN =$row2['IND_Nuisances'];
                            $IDisp=$row2['IND_Disponibilite'];
                            $Panier=$row2['Panier'];
                            $Transport=$row2['Transport'];
                            $Ret=$row2['Retenue'];
                            $Total=$row2['Total'];

                          }

                      $result=GetInfoStaffById($conn,$StaffId);
                      while($row=mysqli_fetch_assoc($result)){
                        $NSS=$row['NSS'];
                        $Sfam=$row['Situation_Fam'];
                        $DateRec=$row['Date_Recrutement'];
                      }

                        $Info="FPId=".$FPId."&NSS=".$NSS."&Sfam=".$Sfam."&DateRec=".$DateRec."&FPDate=".$FPDate."&SB=".$SB."&IEP=".$IEP."&IN=".$IN."&IDisp=".$IDisp."&Panier=".$Panier."&Transport=".$Transport."&Ret=".$Ret."&Total=".$Total;
                        
                        header("location: ListeStaff.php?Function=FP&Show=Yes&StaffNom=$StaffNom&StaffPrenom=$StaffPrenom&StaffId=$StaffId&StaffDateNaiss=$StaffDateNaiss&StaffType=$StaffType&$Info");
                        exit();
                     }
                    }
            

                      header("location: ListeStaff.php?Function=FP&StaffId=$StaffId&StaffNom=$StaffNom&StaffPrenom=$StaffPrenom");
                      exit();

                }

     }else{
          
     $NomPrenom=$StaffNom." ".$StaffPrenom;

     header("location: ListeStaff.php?StaffProfile=Show&Staff=$NomPrenom&StaffId=$StaffId&StaffType=$StaffType");
     exit();
    }

}